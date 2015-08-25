<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function user_memberships() {
        return $this->hasMany('App\User_Membership');
    }
	
	public function goodBadStatus() {
		if($this->active) return "good";
		return "bad";
	}
	
	public function status() {
		if($this->active) return "Active";
		return "Retired";
	}
	
	public function scopeActive($query) {
		$query->where('active','=',1);
	}
	
	public function scopeRetired($query) {
		$query->where('active','=',0);
	}
	
	public function retire() {
		$this->active = 0;
		$this->save();
	}
	
	public function reactivate() {
		$this->active = 1;
		$this->save();
	}
}
