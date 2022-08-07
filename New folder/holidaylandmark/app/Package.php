<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['state' ,'city','price','NoOfDays','Description','Destination','Image','Subscriber','datetime'];


    
    function user()
    {
        return $this->belongsTo(User::class);
    }
}
