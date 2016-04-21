<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_Method extends Model
{
	protected $table = 'payment_methods';

    public function transactions() {
        return $this->hasMany('App\Transactions');
    }

    public function classes() {
        return $this->belongsToMany('App\Classe', 'classe_payment_method', 'payment_method_id','classe_id');
    }

	public function scopeActive($query) {
		$query->where('active','=',1);
	}

	public function scopeGuest($query) {
		$query->where('guest_payment','=',1)
            ->where('active','=',1);
	}
}