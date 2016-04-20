<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaction;
use Auth;
use App\User;

class TransactionsController extends Controller
{
	public function markAwaiting($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markAwaiting();

		return Redirect::back()->with("good", "Successfully marked payment as awaiting.");
	}

	public function markSuccessful($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markSuccessful();

		$this->grantMembershipIfApplicable($transaction);

		return Redirect::back()->with("good", "Successfully marked payment as successful.");
	}

	public function markFailed($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markFailed();

		return Redirect::back()->with("good", "Successfully marked payment as failed.");
	}

	public function markStrike($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markStrike();

		return Redirect::back()->with("good", "Successfully marked payment as strike.");
	}

	public function markResolved($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markResolved();

		$this->grantMembershipIfApplicable($transaction);

		return Redirect::back()->with("good", "Successfully marked payment as resolved.");
	}

	private function grantMembershipIfApplicable($transaction) {
		if($transaction->grant_membership) {
			$user = User::findOrFail($transaction->user_id);
			$user->member = true;
			$user->save();
		}
	}
}
