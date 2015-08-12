<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function user_memberships() {
        return $this->hasMany('App\User_Membership');
    }

    public function classes() {
        return $this->belongsToMany('App\Classe');
    }
}
