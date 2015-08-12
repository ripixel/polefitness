<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function payment_method() {
        return $this->belongsTo('App\Payment_Method');
    }

    public function user_membership() {
        return $this->hasOne('App\User_Membership');
    }
}
