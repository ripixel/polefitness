<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
	protected $dates = ['date'];
	
    public function owner() {
        return $this->belongsTo('App\User');
    }

    public function location() {
        return $this->belongsTo('App\Location');
    }

    public function attendees() {
        return $this->belongsToMany('App\User')->withTimestamps();
    }

    public function memberships_allowed() {
        return $this->belongsToMany('App\Membership');
    }

    public function payment_methods_allowed() {
        return $this->belongsToMany('App\Payment_Method', 'classe_payment_method', 'classe_id', 'payment_method_id');
    }
	
	public function scopeUpcoming($query) {
		$query->where('date', '>=', Carbon::now());
	}
}
