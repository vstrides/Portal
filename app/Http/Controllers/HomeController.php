<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$questions = Question::all();

        return view('home', compact('questions'));
    }
}
