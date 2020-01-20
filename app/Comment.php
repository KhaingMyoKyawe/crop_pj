<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['sellerid','userid','body'];

    public function seller()
    {
    	return $this->belongsTo('App\Seller');
    }
}
