<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller
{
    public function index()
    {
    	$tagsdata = Tag::join('question_tag', 'question_tag.tag_id', '=', 'tags.id')
    				->groupBy(['tags.title'])
    				->get(['tags.title', DB::raw('count(*) as question_count')]);

    	return view('tags.show', compact('tagsdata'));
    }

}
