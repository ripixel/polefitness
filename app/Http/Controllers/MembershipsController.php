<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Membership;

class MembershipsController extends Controller
{	
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
