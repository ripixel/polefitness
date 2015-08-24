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
	
	public function status() {
		if($this->successful) return "Paid";
		if($this->failed) return "Failed";
		if($this->rejected) return "Rejected";
		return "Awaiting Payment";
	}
	
	public function goodBadStatus() {
		if($this->successful) return "good";
		if($this->failed) return "bad";
		if($this->rejected) return "bad";
		return "bold";
	}
	
	public function markAwaiting() {
		$this->successful = 0;
		$this->rejected = 0;
		$this->failed = 0;
		$this->save();
	}
	
	public function markSuccessful() {
		$this->successful = 1;
		$this->rejected = 0;
		$this->failed = 0;
		$this->save();
	}
	
	public function markRejected() {
		$this->successful = 0;
		$this->rejected = 1;
		$this->failed = 0;
		$this->save();
	}
	
	public function markFailed() {
		$this->successful = 0;
		$this->rejected = 0;
		$this->failed = 1;
		$this->save();
	}
}
