<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\EmailRequest;
use App\Http\Controllers\Controller;
use App\Email;
use Auth;

class EmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $emails = Email::orderBy('name','desc')->get();

		return view('emails.index', compact('blog_items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $email = Email::findOrFail($id);

		return view('emails.edit', compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EmailRequest $request, $id)
    {
        $email = Email::findOrFail($id);
		$email->fill($request->all());
		$email->save();

		return Redirect::back()->with("good", "Successfully updated email template.");
    }
}
