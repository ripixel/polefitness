<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Transaction;

class TransactionsController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
		
		return view('transactions.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
		$transaction->fill($request->all());
		$transaction->save();
		
		return Redirect::to('admin/transactions');
    }
	
	public function markAwaiting($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markAwaiting();
		
		return Redirect::back();
	}
	
	public function markSuccessful($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markSuccessful();
		
		return Redirect::back();
	}
	
	public function markFailed($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markFailed();
		
		return Redirect::back();
	}
	
	public function markRejected($id) {
		$transaction = Transaction::findOrFail($id);
		$transaction->markRejected();
		
		return Redirect::back();
	}
}
