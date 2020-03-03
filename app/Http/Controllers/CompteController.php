<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class CompteController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
    
    public function pageCompte()
    {

    	$user = auth()->user();
    	return View('pages.comptes.compte',compact('user'));
    }

    public function modifier(Request $request)
    {
    	$user = auth()->user();

    	$valid = $request->validate([
    		'nom' => 'required|min:2',
    		'prenom' => 'required|min:3',
    		
    	]);

    	if($valid)
    	{
    		$user->client->update([
    			'nom' => $valid['nom'],
    			'prenom' => $valid['prenom'],
    		]);


    		return redirect()->back()->with('success','Modification effectuée avec succés');
    	}else{

    		return redirect()->back()->with('errors','Opération non effectuée');
    	}
    }
}
