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
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'admin', 'picture_url', 'email_confirmed'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function blog_items() {
        return $this->hasMany('App\Blog_Item');
    }

    public function classes_running() {
        return $this->hasMany('App\Classe');
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

    public function classes_attending() {
        return $this->belongsToMany('App\Classe')->withTimestamps()->withPivot('rejected', 'used_free_space', 'transaction_id');
    }
    
    public function fullname() {
        return $this->first_name . ' ' . $this->last_name;
    }
	
	public function free_spaces_remaining() {
		$valid_membership_spaces = DB::table('user_memberships')
									->join('memberships', 'user_memberships.membership_id','=','memberships.id')
									->join('transactions', 'user_memberships.transaction_id','=','transactions.id')
									->where('transactions.successful','=',1)
									->where('user_memberships.user_id','=',$this->id)
									->sum('memberships.free_classes');
		
		$free_spaces_used = DB::table('classe_user')
							->where('used_free_space','=',1)
							->where('user_id','=',$this->id)
							->count();
		
		return $valid_membership_spaces - $free_spaces_used;
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
			}
			return "Active User";
		}
		return "Inactive";
	}
}
