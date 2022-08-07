<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddTrip extends Model
{
    protected $fillable = ['emailid','Phoneno','triptitle','Noofdays','location','iternary'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

}