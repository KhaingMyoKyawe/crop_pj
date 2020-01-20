<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    //
     protected $fillable = [
            'subcategoryid','categoryid','userid','title','price','quantity','image','description'
    ];

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function user()
    {
    	return $this->belognsTo('App\User');
    }
     public function category()
    {
    	return $this->belognsTo('App\Category');
    }
     public function subcategory()
    {
    	return $this->belognsTo('App\Subcategory');
    }

    public function recordlist(){
        return $this->belognsTo('App\Recordlist');
    }

}
