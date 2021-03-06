<?php

namespace App;

use App\Tag;
use App\User;
use App\Answer;
use App\Category;
use App\QuestionVote;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'title', 'body', 'category_id'
    ];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function tags()
    {
    	return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function votes()
    {
        return $this->hasMany(QuestionVote::class);
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
