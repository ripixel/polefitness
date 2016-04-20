<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
	protected $fillable = ['name', 'cost', 'free_classes', 'includes_membership'];

    public function user_memberships() {
        return $this->hasMany('App\User_Membership');
    }

    public function classes() {
        return $this->belongsToMany('App\Classe', 'classe_memberships', 'membership_id','classe_id');
    }

	public function getNameAttribute($value) {
		if($this->active || $this->id == null) {
			return $value;
		}

		return $value . ' (Retired)';
	}

	public function goodBadStatus() {
		if($this->active) return "good";
		return "bad";
	}

	public function status() {
		if($this->active) return "Active";
		return "Retired";
	}

	public function scopeMemberships($query) {
		$query->where('includes_memberships','=',1);
	}

	public function scopePassonly($query) {
		$query->where('includes_memberships','=',0);
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
