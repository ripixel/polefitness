<?php

namespace App;

use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
	protected $dates = ['date', 'end_date'];
	
	protected $fillable = ['title', 'description', 'picture_link', 'date', 'end_date', 'supervisor_id', 'places_available', 'members_only', 'cost', 'location_id'];
	
    public function creator() {
        return $this->belongsTo('App\User', 'user_id');
    }
	
    public function supervisor() {
        return $this->belongsTo('App\User', 'supervisor_id');
    }

    public function location() {
        return $this->belongsTo('App\Location');
    }

	// regardless of approved/rejected status
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
	
	public function setDateAttribute($date) {
		$date = Carbon::createFromFormat('l jS M g:ia', $date);
		$this->attributes['date'] = $date->toDateTimeString();
	}
	
	public function setEndDateAttribute($date) {
		$date = Carbon::createFromFormat('l jS M g:ia', $date);
		$this->attributes['end_date'] = $date->toDateTimeString();
	}
	
	public function goodBadPaymentStatus() {
		if($this->paymentStatus()=="Payments Complete") {
			return "good";
		}
		return "bad";
	}
	
	public function paymentStatus() {
		$payments_complete_count = DB::table('classe_user')
			->join('transactions', 'classe_user.transaction_id','=','transactions.id')
			->where('transactions.successful','=',1)
			->where('classe_user.classe_id','=',$this->id)
			->count();
		$used_free_spaces_count = DB::table('classe_user')
			->where('used_free_space','=',1)
			->where('classe_id','=',$this->id)
			->count();
			
		$outstanding_payments = $this->attendees->count() - ($payments_complete_count + $used_free_spaces_count);
		
		if($outstanding_payments == 0) {
			return "Payments Complete";
		} 
		
		return $outstanding_payments . " Payments Outstanding";
	}
}
