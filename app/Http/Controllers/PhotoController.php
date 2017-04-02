<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
	protected $domainPath = 'http://portal.dev';
    
    public function store(Request $request)
    {
    	$this->validate( $request, [
            'photo' => 'required|mimes:jpg,jpeg,bmp,png'
        ]);

        $photo = Photo::fromForm($request->file('photo'));

        Auth::user()->addPhoto($photo);

        return $this->domainPath . '/' . $photo->path;	
    }
}
