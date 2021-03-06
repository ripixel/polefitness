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
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'admin', 'member', 'picture_link', 'email_confirmed', 'instructor'];

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

    public function classes_instructing() {
        return $this->hasMany('App\Classe','instructor_id');
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
			->where('transactions.failed','!=',1)
			->where('transactions.strike','!=',1)
			->where('user_memberships.membership_id','=', $membership_id)
			->where('user_memberships.user_id','=',$this->id)
			->sum('user_memberships.spaces_left');
	}

	public function guest_passes_left() {
		return DB::table('user_memberships')
			->join('transactions', 'user_memberships.transaction_id', '=', 'transactions.id')
			->where('transactions.failed','!=',1)
			->where('transactions.strike','!=',1)
			->where('user_memberships.user_id','=',$this->id)
			->join('memberships', 'user_memberships.membership_id', '=', 'memberships.id')
			->where('memberships.guest_pass','=',1)
			->sum('user_memberships.spaces_left');
	}

    public function membership_spaces_pending($membership_id) {
		return DB::table('user_memberships')
			->join('transactions', 'user_memberships.transaction_id', '=', 'transactions.id')
			->where('transactions.successful','=',0)
			->where('transactions.failed','=',0)
			->where('transactions.strike','=',0)
			->where('transactions.resolved','=',0)
			->where('user_memberships.membership_id','=', $membership_id)
			->where('user_memberships.user_id','=',$this->id)
			->sum('user_memberships.spaces_left');
    }

    public function membership_spaces_successful($membership_id) {
		return DB::table('user_memberships')
			->join('transactions', 'user_memberships.transaction_id', '=', 'transactions.id')
			->where('user_memberships.membership_id','=', $membership_id)
			->where('user_memberships.user_id','=',$this->id)
            ->where(function($query) {
                $query->where('transactions.successful','=',1)
                ->orWhere('transactions.resolved','=',1);
            })
			->sum('user_memberships.spaces_left');
    }

    public function total_membership_spaces_left() {
        return DB::table('user_memberships')
			->join('transactions', 'user_memberships.transaction_id', '=', 'transactions.id')
			->where('transactions.failed','!=',1)
			->where('transactions.strike','!=',1)
			->where('user_memberships.user_id','=',$this->id)
			->sum('user_memberships.spaces_left');
    }

    public function classes_attending() {
        return $this->belongsToMany('App\Classe')->withTimestamps()->withPivot('rejected', 'used_free_space', 'transaction_id', 'guest', 'guest_name');
    }

    public function picture_link_default() {
        if($this->picture_link == null || $this->picture_link == "") {
            return "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $this->email ) ) ) . "?d=" . urlencode( "http://www.uospolefitness.co.uk/img/profile.png" ) . "&s=" . 200;
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
		if(strpos($this->status(), "Inactive")) {
			return "bad";
		}
		return "good";
	}

	public function status() {
        $return = null;
		if($this->email_confirmed) {
			if($this->admin) {
				$return = "Administrator";
			} else if($this->member) {
				$return = "Society Member";
			} else {
                $return = "Non-Member";
            }
		} else {
            $return = "Inactive";
        }


        if($this->instructor) {
            $return .= ", Instructor";
        }

        return $return;
	}

    public function transactionsOutstanding() {
        return $this->transactions()->awaiting()->count();
    }

    public function transactionsStrike() {
        return $this->transactions()->strike()->count();
    }

    public function transactionStatus() {
        $awaiting = $this->transactions()->awaiting()->count();
        $strike = $this->transactions()->strike()->count();

        if($awaiting == 0 && $strike == 0) {
            return "Transactions";
        } else {
            if($awaiting > 0) {
                $return = $awaiting . " Outstanding Transaction";
                if($strike > 0) {
                    $return .= ", " . $strike . " Strike";
                }

                return $return;
            } else {
                return $strike . " Strike Transaction";
            }
        }
    }

	public function scopeAdmins($query) {
		$query
		->where('admin','=',1)
		->where('email_confirmed','=',1);
	}

	public function scopeInstructors($query) {
		$query
		->where('instructor','=',1)
		->where('email_confirmed','=',1);
	}
}
