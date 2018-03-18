<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('destroy');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sessions.create');
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
		    'email'    => 'required|email',
		    'password' => 'required'
    	]);

    	if( auth()->attempt( request([ 'email', 'password' ]) ) ){
    		session()->flash('status', 'Welcome, back bro !!');
    		return redirect('blog');
    	}
    	else
    		return back()->withErrors([
                'message' => 'Please check your ceredentials and try again.'
            ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth()->logout();

        return redirect('blog')->with('status', 'Logout succesed.');
    }
}
