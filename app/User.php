<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const ADMIN_TYPE = 'admin';
    const COMPANY_TYPE = 'company';
    const SELLER_TYPE = 'seller';

    public function isAdmin($value='')
    {
        return $this->role===self::ADMIN_TYPE;
    }
    public function isCompany($value='')
    {
        return $this->role===self::COMPANY_TYPE;
    }
    public function isSeller($value='')
    {
        return $this->role===self::SELLER_TYPE;
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }

    public function userinfo()
    {
        return $this->hasOne('App\Userinfo');
    }

    public function recordlist(){
        return $this->belongsTo('App\Recordlist');
    }
}
