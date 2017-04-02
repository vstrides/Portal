<?php

namespace App;

use App\Answer;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $fillable = [
		'body',
		'user_id'
	];

    public function answer()
    {
    	return $this->belongsTo(Answer::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
