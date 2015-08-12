<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_Method extends Model
{
    public function transactions() {
        return $this->hasMany('App\Transactions');
    }

    public function classes() {
        return $this->belongsToMany('App\Classe');
    }
}