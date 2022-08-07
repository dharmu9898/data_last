<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requesthelp extends Model
{
	

	protected $fillable = ['user_id','contribution','concern','message'];

    function user()
    {
        return $this->belongsTo(User::class);
    }
}
