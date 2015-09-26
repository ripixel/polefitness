<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\ClasseRequest;
use App\Http\Controllers\Controller;
use App\Classe;
use App\User;
use App\Location;
use App\Transaction;
use App\Payment_Method;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$classes = Classe::Upcoming()->orderBy('date','asc')->get();
		$next_class = $classes->shift();
		
		return view('classes.index', compact('classes', 'next_class'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		$locations = Location::lists('name','id');
		$payment_methods = Payment_Method::lists('name','id');
		$admins = User::Admins()->get();
		$supervisors = $admins->lists('fullname', 'id');
		return view('classes.create', compact('locations', 'payment_methods', 'supervisors'));
    }
	
    public function copy($id)
    {
        $class = Classe::findOrFail($id);
		$class->title = $class->title . " - CLONED";
		$locations = Location::lists('name','id');
		$payment_methods = Payment_Method::lists('name','id');
		$admins = User::Admins()->get();
		$supervisors = $admins->lists('fullname', 'id');
		return view('classes.clone', compact('locations','class','payment_methods', 'supervisors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ClasseRequest $request)
    {		
        $class = new Classe($request->all());
		
		if($class->end_date < $class->date) {
			$class->end_date = $class->date;
		}
		
		$user = User::first();
		$user->classes_created()->save($class);
		
		$payment_methods_allowed = ($request->payment_methods_allowed ?: []);
		$class->payment_methods_allowed()->sync($payment_methods_allowed);
		
		return Redirect::to('admin/classes')->with("good", "Successfully created class.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $class = Classe::findOrFail($id);
		$user = User::first();
		
		return view('classes.show', compact('class','user'));
    }

    /**
     * Display the booking page for the class.
     *
     * @param  int  $id
     * @return Response
     */
    public function book($id)
    {
        $class = Classe::findOrFail($id);
		$user = User::first();
		
		return view('classes.book', compact('class', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
		$locations = Location::lists('name','id');
		$payment_methods = Payment_Method::lists('name','id');
		$admins = User::Admins()->get();
		$supervisors = $admins->lists('fullname', 'id');
        $class = Classe::findOrFail($id);
		
		return view('classes.edit', compact('class','locations','payment_methods', 'supervisors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ClasseRequest $request, $id)
    {
		$class = Classe::findOrFail($id);
		$class->fill($request->all());
		
		if($class->places_available < $class->attendees()->count()) {
			return Redirect::back()->with("bad", "You cannot reduce the number of available places to lower than the amount of people already attending. You must reject some people from the class first if you wish to do this.");
		}
		
		if($class->end_date < $class->date) {
			$class->end_date = $class->date;
		}
		
		$payment_methods_allowed = ($request->payment_methods_allowed ?: []);
		$class->payment_methods_allowed()->sync($payment_methods_allowed);
		
		$class->save();
		
		return Redirect::back()->with("good", "Successfully updated class.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
		$class = Classe::findOrFail($id);
		$class->all_attendees()->detach();
		$class->payment_methods_allowed()->detach();
		$class->delete();
		
		return Redirect::to('admin/classes')->with("good", "Successfully deleted class.");
    }
	
	public function editAttendees($id) {
		$class = Classe::findOrFail($id);
		
		return view('classes.attendees', compact('class'));
	}
	
	public function rejectAttendee($id, $user_id) {
		$class = Classe::findOrFail($id);
		
		$class->all_attendees()->updateExistingPivot($user_id, ['rejected' => 1]);
		
		return Redirect::back()->with("good", "Successfully rejected user.");
	}
	
	public function acceptAttendee($id, $user_id) {
		$class = Classe::findOrFail($id);
		
		$class->all_attendees()->updateExistingPivot($user_id, ['rejected' => 0]);
		
		return Redirect::back()->with("good", "Successfully accepted user.");
	}
}
