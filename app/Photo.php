<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Photo extends Model
{
 	protected $table = 'question_photos';

 	protected $fillable = ['path'];

 	protected $baseDir = 'photos/questions';

 	public function user()
 	{
 		return $this->belongsTo(User::class);	   	
    }   

    public static function fromForm(UploadedFile $file)
    {
    	$photo = new Static;

    	$name = time() . $file->getClientOriginalName();

    	$photo->path = $photo->baseDir . '/' . $name;

    	$file->move( $photo->baseDir, $name);

    	return $photo;
    }
}