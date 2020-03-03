<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MotDePasseOublie;


class MotDePasseOublier extends Controller
{
    //

    public function form()
    {
    	return View('pages.auth.mdpoublier.passforgot');
    }

    public function formAction(Request $request)
    {

    	$validate = $request->validate([

    		"email" => 'required|email',
    	]);

    	$user = User::whereEmail($request->email)->first();

    	if($user != null)
    	{

    		$email = $user->email;
            //$name = $user->client;
            
	        $code = $this->randomPassword();
	        $user->motDePasse = bcrypt($code);
	        $user->save();

	        Mail::to($email)->send(new MotDePasseOublie($user,$code));

    		return redirect()->back()
    			->with(['success' => 'Nous venons de vous envoyer vos identifiants de connexion sur votre adresse email : '.$email]);
    	}
    	else{

    		return redirect()->back()->with(['errors_inf' => 'Vôtre adresse email n\'existe pas? ']);
    	}
    	//dd($email);
    }


    private function randomPassword()
    {
        $lettre = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array();
        $lettreLen = strlen($lettre) - 1;
        for($i=0;$i<8;$i++)
        {
            $n = rand(0, $lettreLen);
            $pass[] = $lettre[$n];
        }
        return implode($pass);
    }
    
}
