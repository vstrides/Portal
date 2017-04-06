<?php

namespace App;

use Carbon\Carbon;
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

	protected $status = 'status';
    
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getDobAttribute($date)
	{
    	return Carbon::parse($date);
	}

	public function getGenderAttribute($gender)
	{
		return $gender ? 'Male' : 'Female';
	}

	public function getStatusAttribute($status)
	{
		return ucwords($status);
	}
}
