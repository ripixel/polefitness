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

		// Stupid checkboxes don't get a value sent back if they're not checked
		// So if they're null, set the value to 0
		$membership->includes_membership = $request->includes_membership ? 1 : 0;

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
