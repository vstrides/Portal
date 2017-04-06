<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
	

	public function __construct()
	{

		$this->middleware('auth');

	}

    
    public function show(User $user)
    {
    	
    	$profile = $user->profile;
    	return view('profile.show', compact('profile'));

    }

    public function update(Request $request, Profile $profile)
    {

    	$this->authorize('update', $profile);
		$profile->update($request->all());
		return response('Name successfully updated', 200);

    }

}