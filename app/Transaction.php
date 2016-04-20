<?php

namespace App;

use DB;

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

	public function hasClass() {
		$classesFound = DB::table('classe_user')
							->where('transaction_id','=',$this->id)
							->count();
		if($classesFound > 0) {
			return TRUE;
		}
		return FALSE;
	}

	public function classId() {
		$classId = DB::table('classe_user')
						->select('classe_id')
						->where('transaction_id','=',$this->id)
						->first()->classe_id;
		return $classId;
	}

	public function status() {
		if($this->successful) return "Paid";
		if($this->failed) return "Failed";
		if($this->strike) return "Strike";
		if($this->resolved) return "Resolved";
		return "Awaiting Payment";
	}

	public function goodBadStatus() {
		if($this->successful) return "good";
		if($this->failed) return "bad";
		if($this->strike) return "bad";
		if($this->resolved) return "good";
		return "bold";
	}

	public function markAwaiting() {
		$this->successful = 0;
		$this->resolved = 0;
		$this->failed = 0;
		$this->strike = 0;
		$this->save();
	}

	public function markSuccessful() {
		$this->successful = 1;
		$this->resolved = 0;
		$this->failed = 0;
		$this->strike = 0;
		$this->save();
	}

	public function markResolved() {
		$this->successful = 0;
		$this->resolved = 1;
		$this->failed = 0;
		$this->strike = 0;
		$this->save();
	}

	public function markFailed() {
		$this->successful = 0;
		$this->resolved = 0;
		$this->failed = 1;
		$this->strike = 0;
		$this->save();
	}

	public function markStrike() {
		$this->successful = 0;
		$this->resolved = 0;
		$this->failed = 0;
		$this->strike = 1;
		$this->save();
	}

	public function scopeSuccessful($query) {
		$query->where('successful','=',1);
	}

	public function scopeFailed($query) {
		$query->where('failed','=',1);
	}

	public function scopeStrike($query) {
		$query->where('strike','=',1);
	}

	public function scopeResolved($query) {
		$query->where('resolved','=',1);
	}

	public function scopeAwaiting($query) {
		$query->where('resolved','=',0)
			->where('successful','=',0)
			->where('failed','=',0)
			->where('strike','=',0);
	}
}
