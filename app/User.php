<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function blog_items() {
        return $this->hasMany('App\Blog_Item');
    }

    public function classes_running() {
        return $this->hasMany('App\Classe');
    }

    public function tokens() {
        return $this->hasMany('App\Tokens');
    }

    public function transactions() {
        return $this->hasMany('App\Transactions');
    }

    public function user_memberships() {
        return $this->hasMany('App\User_Membership');
    }

    public function classes_attending() {
        return $this->belongsToMany('App\Classe')->withTimestamps();
    }
    
    public function fullname() {
        return $this->first_name . ' ' . $this->last_name;
    }
}
