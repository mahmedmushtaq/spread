<?php

namespace App;



class Profile extends Model
{
    //
    protected $fillable = [
      'twitter','linkedIn'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
