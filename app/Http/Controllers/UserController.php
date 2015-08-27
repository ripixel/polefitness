<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Membership;
use App\User_Membership;

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
		$user_membership = new User_Membership();
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
		
		$admin_check = $request->admin ? 1 : 0;
		$active_check = $request->email_confirmed ? 1 : 0;
		
		$user->admin = $admin_check;
		$user->email_confirmed = $active_check;
		
		$user->save();
		
		return Redirect::back()->with("good", "Successfully updated user");
    }
	
	public function emailDump() {
		$emails = User::where('email_confirmed','=',1)->lists('email');
		return view('users.emaildump', compact('emails'));
	}
}