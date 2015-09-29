<?php

namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'admin', 'member', 'picture_url', 'email_confirmed'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function blog_items() {
        return $this->hasMany('App\Blog_Item');
    }

    public function classes_supervising() {
        return $this->hasMany('App\Classe','supervisor_id');
    }

    public function classes_created() {
        return $this->hasMany('App\Classe','user_id');
    }

    public function tokens() {
        return $this->hasMany('App\Token');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function user_memberships() {
        return $this->hasMany('App\User_Membership');
    }
	
	public function membership_spaces_left($membership_id) {
		return DB::table('user_memberships')
			->join('transactions', 'user_memberships.transaction_id', '=', 'transactions.id')
			->where('transactions.successful','=',1)
			->where('user_memberships.membership_id','=', $membership_id)
			->sum('user_memberships.spaces_left');
	}

    public function classes_attending() {
        return $this->belongsToMany('App\Classe')->withTimestamps()->withPivot('rejected', 'used_free_space', 'transaction_id');
    }
    
    public function picture_link_default() {
        if($this->picture_link == null || $this->picture_link == "") {
            return "http://www.uospolefitness.co.uk/img/profile.png";
        } else {
            return $this->picture_link;
        }
    }
	
	public function getFullnameAttribute() {
		return $this->fullname();
	}
    
    public function fullname() {
        return $this->first_name . ' ' . $this->last_name;
    }
	
	public function goodBadStatus() {
		if($this->status()=="Inactive") {
			return "bad";
		}
		return "good";
	}
	
	public function status() {
		if($this->email_confirmed) {
			if($this->admin) {
				return "Administrator";
			} else if($this->member) {
				return "Society Member";
			}
			return "Non-Member";
		}
		return "Inactive";
	}
	
	public function scopeAdmins($query) {
		$query
		->where('admin','=',1)
		->where('email_confirmed','=',1);
	}
}
