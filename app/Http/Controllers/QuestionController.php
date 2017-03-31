<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Photo;
use App\Category;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    protected $domainPath = 'http://portal.dev';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title','id');
        return view('questions.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Auth::user()->questions()->create($request->all());
        $question->tags()->sync($request->input('tags'));
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addPhotos(Request $request)
    {
        $this->validate( $request, [
            'photo' => 'required|mimes:jpg,jpeg,bmp,png'
        ]);

        $photo = Photo::fromForm($request->file('photo'));

        Auth::user()->addPhoto($photo);

        return $this->domainPath . '/' . $photo->path;
    }
}
