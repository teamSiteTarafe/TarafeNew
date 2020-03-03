<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Admin};

class AdminController extends Controller
{
   	
   	public function __construct()
   	{
   		$this->middleware('auth');
   	}

   	public function pageAdmin()
   	{
   		$user = auth()->user();
   		//dd($user->id);
   		$id = Admin::all('user_id');
   		//dd($id);

   		if($id)
   		{
   			return View('pages.admin.index', compact('admin'));
   		}else{
   			return redirect()->back();
   		}
   	}
}
