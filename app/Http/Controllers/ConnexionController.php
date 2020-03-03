<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Client, Boutique, Atelier, Admin};
//use App\Client
class ConnexionController extends Controller
{
    

    // Client

    public function pageConnexionClient()
    {
    	return View('pages.auth.client.connexion');
    }

    public function connexionClient()
    {


    	$valide = request()->validate([

    		"email" => 'required|email',
    		"password" => 'required|min:6',

    	]);

        if($valide)
        {
            /*
                *
                ** Recupération des données de l'utilisateur
                *
                **Verifier s'il exite 
            */
            $userdata = User::where('email', $valide['email']);
            $user = $userdata->first();
            

            if($user != null)
            {

                //Si le user existe, on compare sa clé primaire à celle du client: si
                // La clé existe dans le deux table on le connecte et le redireiger

                $clientdata = Client::where('user_id', $user->id);
                $client = $clientdata->first();

                if($client != null)
                {
                    if(password_verify($valide['password'], $user->motDePasse))
                    {
                        auth()->login($user);
                            
                        return redirect()->route('page.compte')->with(
                            ['success' => $client->nom.', Bienvenue sur votre Compte']
                        );
                    }
                    else{
                        return redirect()->back()->with('errors','Mot de passe ou email incorrect');
                    }
                }

                else{
                    return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
                }

            }
            else{
                return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
            }
        } 
        else
        {
            return redirect()->back()->withErrors($valide);
        }
    }

    public function deconnexion()
    {

    	auth()->logout();
    	return redirect()->route('page.connexion')->with('success','Vous êtes maintenant déconnecté');
    }

    // Boutique

    public function pageConnexionBoutique()
    {
        return View('pages.auth.boutique.connexion');
    }

    public function connexionBoutique()
    {


        $valide = request()->validate([

            "email" => 'required|email',
            "password" => 'required|min:6',

        ]);

        if($valide)
        {
            /*
                *
                ** Recupération des données de l'utilisateur
                *
                **Verifier s'il exite 
            */
            $userdata = User::where('email', $valide['email']);
            $user = $userdata->first();
            

            if($user != null)
            {

                //Si le user existe, on compare sa clé primaire à celle de la //boutique: si
                //La clé existe dans le deux table on la connecte et la redireigée

                $boutikdata = Boutique::where('user_id', $user->id);
                $boutik = $boutikdata->first();

                if($boutik != null)
                {
                    if(password_verify($valide['password'], $user->motDePasse))
                    {
                        auth()->login($user);
                            
                        return redirect()->route('page.boutique')->with(
                            ['success' => $boutik->nom.', Bienvenue sur votre Boutique']
                            );
                    }
                    else{
                        return redirect()->back()->with('errors','Mot de passe ou email incorrect');
                    }
                }

                else{
                    return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
                }

            }
            else{
                return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
            }
        } 
 
    }

    public function deconnexionBoutique()
    {
        auth()->logout();
        return redirect()->route('page.connexion.boutique')->with('success','Vous êtes maintenant déconnecté');
    }


    // Atelier

    public function pageConnexionAtelier()
    {
        return View('pages.auth.atelier.connexion');
    }

    public function connexionAtelier()
    {


        $valide = request()->validate([

            "email" => 'required|email',
            "password" => 'required|min:6',

        ]);

        if($valide)
        {
            /*
                *
                ** Recupération des données de l'utilisateur
                *
                **Verifier s'il exite 
            */
            $userdata = User::where('email', $valide['email']);
            $user = $userdata->first();
            

            if($user != null)
            {

                //Si le user existe, on compare sa clé primaire à celle de //l'atelier: si
                //La clé existe dans le deux table on le connecte et le redireiger

                $atelierdata = Atelier::where('user_id', $user->id);
                $atelier = $atelierdata->first();

                if($atelier != null)
                {
                    if(password_verify($valide['password'], $user->motDePasse))
                    {

                        auth()->login($user);
                            
                        return redirect()->route('page.atelier')->with(
                            ['success' => $atelier->nom.', Bienvenue sur votre Atelier']
                            );

                        //Se souvenir de moi
                        // if(request('remember'))
                        // {
                        //     //connexion
                        //     auth()->login($user, true);
                        // }
                        // //Connexion
                        // auth()->login($user, false);
                        // return redirect(request('page'))->with(['success' => $atelier->nom.', Bienvenue sur votre atelier']);  
                    }
                    else{
                        return redirect()->back()->with('errors','Mot de passe ou email incorrect');
                    }
                }

                else{
                    return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
                }

            }
            else{
                return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
            }
        } 
        else
        {
            return redirect()->back()->withErrors($valide);
        }
    }

    public function deconnexionAtelier()
    {
        auth()->logout();
        return redirect()->route('page.connexion.atelier')->with('success','Vous êtes maintenant déconnecté');
    }


    //Admin

    public function pageConnexionAdmin()
    {
        return View('pages.auth.admin.connexion');
    }

    public function connexionAdmin()
    {


        $valide = request()->validate([

            "email" => 'required|email',
            "password" => 'required|min:6',

        ]);

        if($valide)
        {
            /*
                *
                ** Recupération des données de l'utilisateur
                *
                **Verifier s'il exite 
            */
            $userdata = User::where('email', $valide['email']);
            $user = $userdata->first();
            

            if($user != null)
            {

                //Si le user existe, on compare sa clé primaire à celle de l'admin
                //et si
                //La clé existe dans les deux table on le connecte et le redireiger

                $admindata = Admin::where('user_id', $user->id);
                $admin = $admindata->first();

                if($admin != null)
                {
                    if(password_verify($valide['password'], $user->motDePasse))
                    {
                        //connexion
                        auth()->login($user);

                        return redirect()->route('page.admin')->with(
                            ['success' => $admin->nom.', Bienvenue sur votre page']
                        );
                    }
                    else{
                        return redirect()->back()->with('errors','Mot de passe ou email incorrect');
                    }
                }

                else{
                    return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
                }

            }
            else{
                return redirect()->back()->with('errors','Cette adresse email ne peut acceder à cette page');
            }
        } 
        else
        {
            return redirect()->back()->withErrors($valide);
        }
    }

    public function deconnexionAdmin()
    {
        auth()->logout();
        return redirect()->route('page.connexion.admin')->with('success','Vous êtes maintenant déconnecté');
    }

}
