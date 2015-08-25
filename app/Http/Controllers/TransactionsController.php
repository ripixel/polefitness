<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaction;

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
		
		return Redirect::back()->with("good", "Successfully marked payment as successful.");
	}
	
	public function markFailed($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markFailed();
		
		return Redirect::back()->with("good", "Successfully marked payment as failed.");
	}
	
	public function markRejected($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markRejected();
		
		return Redirect::back()->with("good", "Successfully marked payment as rejected.");
	}
}
