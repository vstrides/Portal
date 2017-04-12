<?php

namespace App;

use Carbon\Carbon;
use App\Profilephoto;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	protected $fillable = [
		'name',
		'dob',
		'gender',
		'status',
		'bio'
	];

	protected $date = ['dob'];

	protected $gender = ['gender'];

	protected $status = ['status'];
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getDobAttribute($date)
	{
		if ($date) {
			return Carbon::parse($date);
		}
    	
	}

	public function getGenderAttribute($gender)
	{
			$gender ?? $gender ? 'Male' : 'Female';
	}

	public function getStatusAttribute($status)
	{
		if ($status) {
			return ucwords($status);
		}
	}

	public function photo()
	{
		return $this->hasOne(Profilephoto::class);
	}

	public function addPhoto(Profilephoto $photo)
    {
        return $this->photo()->update($photo->toArray());
    }

}