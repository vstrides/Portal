<?php

namespace App;

use App\Question;
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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
}