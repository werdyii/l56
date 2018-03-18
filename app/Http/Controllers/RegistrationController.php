<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('registration.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      	$request->validate([
		    'name'    => 'required|string|max:200',
		    'email'    => 'required|email|unique:users,email',
		    'password' => 'required|confirmed|min:6|max:200'
    	]);


    	$user = User::create([
    		'name' => request('name'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    	]);

    	Auth()->login( $user );

        return redirect('blog')->with('status', 'Ďakujeme za registraciu.');
    }
}
