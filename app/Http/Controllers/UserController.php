<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\UserRequest;
use App\Http\Requests\PurchaseMembershipRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Membership;
use App\User_Membership;
use App\Transaction;
use App\Payment_Method;

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
        $user = User::findOrFail($id);
		
		return view('profile.edit', compact('user'));
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
		
		return view('users.edit_admin', compact('user'));
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
	
    public function memberships()
    {
        $user = User::first();
		$memberships = Membership::active()->orderBy('cost','desc')->get();
		
		return view('users.memberships', compact('user','memberships'));
    }
	
	public function purchaseMembership($membership_id) {
		$user = User::first();
		$membership = Membership::findOrFail($membership_id);
		$payment_methods = Payment_Method::active()->lists('name', 'id');
		
		return view('users.purchase_membership', compact('user', 'membership','payment_methods'));
	}
	
	public function purchaseMembershipComplete(PurchaseMembershipRequest $request) {
		
		$user = User::first();
		
		$membership = Membership::findOrFail($request->membership_id);
		
		$transaction = new Transaction();
		$transaction->payment_method_id = $request->payment_method_id;
		$transaction->name = "Membership Fee";
		$transaction->description = "Membership type \"" . $membership->name . "\"";
		$transaction->amount = $membership->cost;
		$user->transactions()->save($transaction);
		
		$user_membership = new User_Membership();
		$user_membership->membership_id = $membership->id;
		$user_membership->transaction_id = $transaction->id;
		$user_membership->spaces_left = $membership->free_classes;
		$user->user_memberships()->save($user_membership);
		
		return view('users.purchase_membership_complete', compact('user', 'transaction', 'membership'));
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
	
	public function emailDump() {
		$emails = User::where('email_confirmed','=',1)->lists('email');
		return view('users.emaildump', compact('emails'));
	}
}