<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //
    protected $fillable = ['user_id','image','phno','address','timelength','status'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    
    public function recordlist(){
        return $this->belongsTo('App\Recordlist');
    }
}
