<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\Boutique;
use App\Atelier;
use App\Admin;

class InscriptionController extends Controller
{
    
    // Client
    public function pageInscriptionClient()
    {
    	return View('pages.auth.client.inscription');
    }

    public function inscriptionCleint()
    {
    	$valide = request()->validate([

    		'email' => 'required|email',
    		'contact' => 'required|min:8',
    		'mot_de_pass' => 'required|min:6',
    		'mot_de_pass_conf' => 'same:mot_de_pass',

    	]);

    	if($valide)
    	{
    		
    		$create = User::create([

    			'email' => $valide['email'],
    			'motDePasse' => bcrypt($valide['mot_de_pass']), //bcrypt

    		]);

    		$create->save();

    		if($create)
    		{
                $clt = new Client;
                $clt->numeroDeTelephone = request("contact");
                $clt->user_id = $create->id;
                $clt->save();

    			return redirect()->route('page.connexion')
    			->with('success','Inscription effectuée avec succés');
    		}
    		else
    		{
    			return redirect()->back()->with('errors','Inscription non effectuée');
    		}
    	}else
    	{
    		return redirect()->back()->with('errors','Inscription non effectuée');
    	}
    }


    // Boutique

    public function pageInscriptionBoutique()
    {
        return View('pages.auth.boutique.inscription');
    }

    public function inscriptionBoutique()
    {
        $valide = request()->validate([

            'contact' => 'required|min:8',
            'email' => 'required|email',
            'mot_de_pass' => 'required|min:6',
            'mot_de_pass_conf' => 'same:mot_de_pass',

        ]);

        if($valide)
        {
            
            $create = User::create([

                'email' => $valide['email'],
                'motDePasse' => bcrypt($valide['mot_de_pass']), //bcrypt

            ]);
 
            $create->save();

            if($create)
            {

                $clt = new Boutique;
                $clt->numeroDeTelephone = request("contact");
                $clt->user_id = $create->id;
                $clt->save();

                return redirect()->route('page.connexion.boutique')
                ->with('success','Inscription effectuée avec succés');
            }
            else
            {
                return redirect()->back()->with('errors','Inscription non effectuée');
            }
        }else
        {
            return redirect()->back()->with('errors','Inscription non effectuée');
        }
    }


    // Atelier

    public function pageInscriptionAtelier()
    {
        return View('pages.auth.atelier.inscription');
    }

    public function inscriptionAtelier()
    {
        $valide = request()->validate([

            'contact' => 'required|min:8',
            'email' => 'required|email',
            'mot_de_pass' => 'required|min:6',
            'mot_de_pass_conf' => 'same:mot_de_pass',

        ]);

        if($valide)
        {
            
            $create = User::create([

                'email' => $valide['email'],
                'motDePasse' => bcrypt($valide['mot_de_pass']), //bcrypt

            ]);
 
            $create->save();

            if($create)
            {

                $clt = new Atelier;
                $clt->numeroDeTelephone = request("contact");
                $clt->user_id = $create->id;
                $clt->save();

                return redirect()->route('page.connexion.atelier')
                ->with('success','Inscription effectuée avec succés');
            }
            else
            {
                return redirect()->back()->with('errors','Inscription non effectuée');
            }
        }else
        {
            return redirect()->back()->with('errors','Inscription non effectuée');
        }
    }

    // Admin

    public function pageInscriptionAdmin()
    {
        return View('pages.auth.admin.inscription');
    }

    public function inscriptionAdmin()
    {
        $valide = request()->validate([

            'contact' => 'required|min:8',
            'email' => 'required|email',
            'mot_de_pass' => 'required|min:6',
            'mot_de_pass_conf' => 'same:mot_de_pass',

        ]);

        if($valide)
        {
            
            $create = User::create([

                'email' => $valide['email'],
                'motDePasse' => bcrypt($valide['mot_de_pass']), //bcrypt

            ]);
 
            $create->save();

            if($create)
            {

                $clt = new Admin;
                $clt->numeroDeTelephone = request("contact");
                $clt->user_id = $create->id;
                $clt->save();

                return redirect()->route('page.connexion.admin')
                ->with('success','Inscription effectuée avec succés');
            }
            else
            {
                return redirect()->back()->with('errors','Inscription non effectuée');
            }
        }else
        {
            return redirect()->back()->with('errors','Inscription non effectuée');
        }
    }
}
