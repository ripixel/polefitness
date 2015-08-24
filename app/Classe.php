<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
	protected $dates = ['date'];
	
	protected $fillable = ['title', 'description', 'picture_link', 'date', 'places_available', 'members_only'];
	
    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function location() {
        return $this->belongsTo('App\Location');
    }

    public function all_attendees() {
        return $this->belongsToMany('App\User')->withTimestamps()->withPivot('rejected', 'used_free_space', 'transaction_id');
    }
	
	// only approved attendees
	public function attendees() {
		return $this->all_attendees()->where('rejected','=',0);
	}

    public function payment_methods_allowed() {
        return $this->belongsToMany('App\Payment_Method', 'classe_payment_method', 'classe_id', 'payment_method_id');
    }
	
	public function scopeUpcoming($query) {
		$query->where('date', '>=', Carbon::now());
	}
}
