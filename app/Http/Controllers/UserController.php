<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use Auth;

use App\Http\Requests\UserRequest;
use App\Http\Requests\GrantRemoveMembershipRequest;
use App\Http\Requests\PurchaseMembershipRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Membership;
use App\User_Membership;
use App\Transaction;
use App\Payment_Method;

use DB;

class UserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('profile.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
		$user->save();
		
		return Redirect::back()->with("good", "Successfully registered");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        $user = Auth::user();
		
		return view('users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminEdit($id)
    {
        $user = User::findOrFail($id);
		
		$all_memberships = Membership::orderBy('created_at','desc')->get();
		$memberships = $all_memberships->lists('name', 'id');
		
		return view('users.edit_admin', compact('user', 'memberships'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminTransactions($id)
    {
        $user = User::findOrFail($id);
		
		return view('users.transactions_admin', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function adminClasses($id)
    {
        $user = User::findOrFail($id);
		
		return view('users.classes_admin', compact('user'));
    }
	
    public function profile()
    {
        $user = Auth::user();
		
		return view('users.profile', compact('user'));
    }
	
    public function classes()
    {
        $user = Auth::user();
		
		return view('users.classes', compact('user'));
    }
	
    public function memberships()
    {
        $user = Auth::user();
		$memberships = Membership::active()->orderBy('cost','desc')->get();
		
		return view('users.memberships', compact('user','memberships'));
    }
	
    public function transactions()
    {
        $user = Auth::user();
		
		return view('users.transactions', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
		$user->fill($request->all());
		
		// Stupid checkboxes don't get a value sent back if they're not checked
		// So if they're null, set the value to 0
		$user->admin = $request->admin ? 1 : 0;
		$user->email_confirmed = $request->email_confirmed ? 1 : 0;
		
		$user->save();
		
		return Redirect::back()->with("good", "Successfully updated user");
    }
	
    public function updatePublic(UserRequest $request)
    {
        $user = Auth::user();
		$user->fill($request->all());
		
		$user->save();
		
		return Redirect::back()->with("good", "Successfully updated user");
    }
	
    public function updatePassword(UserRequest $request)
    {
        $user = Auth::user();
		$user->password = bcrypt($request->password);		
		$user->save();
		
		return Redirect::back()->with("good", "Successfully updated user");
    }
	
	public function emailDump() {
		$emails = User::where('email_confirmed','=',1)->lists('email');
		return view('users.emaildump', compact('emails'));
	}
	
	public function purchaseMembership($membership_id) {
		$user = Auth::user();
		$membership = Membership::findOrFail($membership_id);
		$payment_methods = Payment_Method::active()->lists('name', 'id');
		
		return view('users.purchase_membership', compact('user', 'membership','payment_methods'));
	}
	
	public function purchaseMembershipComplete(PurchaseMembershipRequest $request) {
		
		$user = Auth::user();
		
		$membership = Membership::findOrFail($request->membership_id);
		
		$transaction = new Transaction();
		$transaction->payment_method_id = $request->payment_method_id;
		$transaction->name = "Membership Fee";
		$transaction->description = $membership->name;
		$transaction->amount = $membership->cost;
		$user->transactions()->save($transaction);
		
		$user_membership = new User_Membership();
		$user_membership->membership_id = $membership->id;
		$user_membership->transaction_id = $transaction->id;
		$user_membership->spaces_left = $membership->free_classes;
		$user->user_memberships()->save($user_membership);
		
		return view('users.purchase_membership_complete', compact('user', 'transaction', 'membership'));
	}
	
	public function grantMembership(GrantRemoveMembershipRequest $request) {
		
		$user = User::findOrFail($request->user_id);
		
		$membership = Membership::findOrFail($request->membership_id);
		
		$transaction = new Transaction();
		$transaction->payment_method_id = 4;
		$transaction->name = "Admin Granted Memberships";
		$transaction->description = $request->spaces_to_change . " x " . $membership->name . " spaces granted";
		$transaction->amount = 0;
		$transaction->successful = 1;
		$user->transactions()->save($transaction);
		
		$user_membership = new User_Membership();
		$user_membership->membership_id = $membership->id;
		$user_membership->transaction_id = $transaction->id;
		$user_membership->spaces_left = $request->spaces_to_change;
		$user->user_memberships()->save($user_membership);
		
		return Redirect::back()->with("good", "Successfully granted " . $request->spaces_to_change . " memberships.");
		
	}
	
	public function removeMembership(GrantRemoveMembershipRequest $request) {
		
		$user = User::findOrFail($request->user_id);
		
		$spaces_left = $user->membership_spaces_left($request->membership_id);
		if($spaces_left < $request->spaces_to_change) {
			return Redirect::back()->with("bad", "You cannot remove more memberships than the user currently has (" . $spaces_left . ").");
		}
		
		$membership = Membership::findOrFail($request->membership_id);
		
		$spaces_to_remove = $request->spaces_to_change;
		
		while($spaces_to_remove > 0) {
		
			$user_membership_id = DB::table('user_memberships')
				->join('transactions', 'user_memberships.transaction_id', '=', 'transactions.id')
				->where('transactions.successful','=',1)
				->where('user_memberships.membership_id','=', $request->membership_id)
				->where('user_memberships.user_id','=', $user->id)
				->where('user_memberships.spaces_left','>',0)
				->select('user_memberships.id')->first();
			$user_membership = User_Membership::findOrFail($user_membership_id->id);
			$spaces_removing_now = min($spaces_to_remove, $user_membership->spaces_left);
			$user_membership->spaces_left = $user_membership->spaces_left - $spaces_removing_now;
			$user_membership->save();
			$spaces_to_remove = $spaces_to_remove - $spaces_removing_now;
		}
		
		$transaction = new Transaction();
		$transaction->payment_method_id = 4;
		$transaction->name = "Admin Removed Memberships";
		$transaction->description = $request->spaces_to_change . " x " . $membership->name . " spaces removed";
		$transaction->amount = 0;
		$transaction->successful = 1;
		$user->transactions()->save($transaction);
		
		return Redirect::back()->with("good", "Successfully removed " . $request->spaces_to_change . " memberships.");
		
	}
}