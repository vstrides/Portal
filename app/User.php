<?php

namespace App;

use App\Photo;
use App\Answer;
use App\Profile;
use App\Question;
use App\AnswerVote;
use App\QuestionVote;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function aVotes()
    {
        return $this->hasMany(AnswerVote::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }

    public function qVotes()
    {
        return $this->hasMany(QuestionVote::class);
    }

    public function owns($entity)
    {
        return $this->id == $entity->user_id;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}