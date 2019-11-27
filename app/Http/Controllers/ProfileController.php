<?php

namespace Atomix\Http\Controllers;

use Auth;

use Atomix\User;
use Atomix\Atom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    public function getProfile($username)
    {
        $user = User::where('name', $username)->first();
    
        if(!$user)
		{
			abort(404);
		}
		
		return view('profile.index')->with('user', $user);
    }
}
