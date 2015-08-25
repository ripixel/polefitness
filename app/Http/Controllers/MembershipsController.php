<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\MembershipRequest;
use App\Http\Controllers\Controller;
use App\Membership;

class MembershipsController extends Controller
{	
	public function create() {
		return view('memberships.create');
	}
	
	public function store(MembershipRequest $request) {
		$membership = New Membership($request->all());
		$membership->save();
		
		return Redirect::to('admin/memberships')->with("good". "Successfully created membership.");
	}
	
	public function retire($id) {
		$membership = Membership::findOrFail($id);
		$membership->retire();
		
		return Redirect::back()->with("good", "Successfully retired membership.");
	}
	
	public function reactivate($id) {
		$membership = Membership::findOrFail($id);
		$membership->reactivate();
		
		return Redirect::back()->with("good", "Successfully reactivated membership.");
	}
}
