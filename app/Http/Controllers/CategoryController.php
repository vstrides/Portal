<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
    	$categoriesdata = Category::join('questions', 'questions.category_id', '=', 'categories.id')
    				->groupBy(['Categories.title'])
    				->get(['categories.title', DB::raw('count(*) as question_count')]);

    	return view('cateogries.show', compact('categoriesdata'));	
    }
}
