<?php

namespace App;

use App\User;
use App\AnswerVote;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
    	'body',
        'question_id'
    ];

    public function votes()
    {
        return $this->hasMany(AnswerVote::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function question()
    {
    	return $this->belongsTo(Question::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getVotes()
    {
        $status = $this->votes()->pluck('status');
        $votes = 0;
        foreach ($status as $value) {
            $value ? $votes++ : $votes--;
        }
        return $votes;
    }
}
