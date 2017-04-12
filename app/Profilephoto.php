<?php

namespace App;

use App\Profile;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;

class Profilephoto extends Model
{
    protected $fillable = ['path'];

    protected $baseDir = 'photos/profile';

    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }

    public static function fromForm(UploadedFile $file)
    {
    	$photo = new Static;

    	$name = time() . $file->getClientOriginalName();

    	$photo->path = '/' . $photo->baseDir . '/' . $name;

    	$file->move( $photo->baseDir, $name);

    	return $photo;
    }
}
