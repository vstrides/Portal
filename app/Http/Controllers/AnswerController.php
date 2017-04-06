<?php

namespace App\Http\Controllers;

use App\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    
    /**
     * Display a listing of the Answers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new Answer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created Answer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Auth::user()->answers()->create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified Answer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        return view('answers.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified Answer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        return $answer->body;
    }

    /**
     * Update the specified Answer in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        
        $this->authorize('update', $answer);
        $answer->update($request->all());
        return redirect(route('questions.show', $answer->question->id));

    }

    /**
     * Remove the specified Answer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        $this->authorize('delete', $answer);
        $answer->delete();
        return route('questions.show', $answer->question->id);
    }

    public function vote(Request $request, Answer $answer)
    {

        $vote = Auth::user()->aVotes()->where('answer_id', $answer->id)->get();

        if($vote->isNotEmpty())
        {
            if($vote['0']->status == $request->input('status'))
                return $answer->getVotes();
            else
            {
                $vote['0']->delete();
                return $answer->getVotes();
            }
        }
        else
        {
            Auth::user()->aVotes()->create([
                'answer_id' => $answer->id,
                'status' => $request->input('status')
            ]);

            return $answer->getVotes();
        }
    }
    
}
