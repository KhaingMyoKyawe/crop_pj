<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recordlist extends Model
{
    protected $fillable = ['userid','image','phno','address','timelength'];

    public function user()
    {
    	return $this->hasMany('App\User');
    }
    public function userinfo()
    {
        return $this->hasMany('App\Userinfo');
    }
}
