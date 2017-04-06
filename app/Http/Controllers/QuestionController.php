<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the question.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $questions = Question::all();
        return view('home', compact('questions'));
        
    }

    /**
     * Show the form for creating a new question.
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
     * Store a newly created question in storage.
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
     * Display the specified question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {

        return view('questions.show', compact('question'));

    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {

        $categories = Category::pluck('title', 'id');
        $tags = Tag::pluck('title','id');
        return view('questions.edit', compact('question','categories','tags'));

    }

    /**
     * Update the specified question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {

        $this->authorize('update', $question);
        $question->update($request->all());
        $question->tags()->sync($request->input('tags'));
        return redirect(route('questions.show', $question->id));

    }

    /**
     * Remove the specified question from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {

        $this->authorize('delete', $question);
        $question->delete();
        return '/';

    }

    public function vote(Request $request, Question $question)
    {

        $vote = Auth::user()->qVotes()->where('question_id', $question->id)->get();
        if($vote->isNotEmpty())
        {
            if($vote['0']->status == $request->input('status'))
                return $question->getVotes();
            else
            {
                $vote['0']->delete();
                return $question->getVotes();
            }
        }
        else
        {
            Auth::user()->qVotes()->create([
                'question_id' => $question->id,
                'status' => $request->input('status')
            ]);
            return $question->getVotes();
        }
    }
}