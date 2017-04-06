<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AnswerVote extends Model
{
    protected $table = 'answer_vote';

    protected $fillable = [
    	'answer_id',
    	'status'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }
}