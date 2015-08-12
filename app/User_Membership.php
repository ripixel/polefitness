<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Membership extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function membership() {
        return $this->belongsTo('App\Membership');
    }

    public function transaction() {
        return $this->belongsTo('App\Transaction');
    }
}
