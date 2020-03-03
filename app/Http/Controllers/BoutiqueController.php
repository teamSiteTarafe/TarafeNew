<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoutiqueController extends Controller
{


	public function __construct()
   	{
   		$this->middleware('auth');
   	}
    

    public function pageBoutique()
   	{
   		$boutique = auth()->user();

   		return View('pages.boutiques.index',compact('boutique'));
   	}

}
