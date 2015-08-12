<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function location() {
        return $this->belongsTo('App\Location');
    }

    public function attendees() {
        return $this->belongsToMany('App\Classe');
    }

    public function memberships_allowed() {
        return $this->belongsToMany('App\Membership');
    }

    public function payment_methods_allowed() {
        return $this->belongsToMany('App\Payment_Method');
    }
}
