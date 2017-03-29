<?php

namespace App;

use App\Tag;
use App\User;
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

}