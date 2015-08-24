<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classe;
use App\User;
use App\Location;
use App\Transaction;

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
		return view('classes.create', compact('locations'));
    }
	
    public function copy($id)
    {
        $class = Classe::findOrFail($id);
		$locations = Location::lists('name','id');
		return view('classes.clone', compact('locations','class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $class = new Classe($request->all());
		$class->location_id = $request->location_id;
		$user = User::first();
		$user->classes_running()->save($class);
		
		return Redirect::to('admin/classes');
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
        $class = Classe::findOrFail($id);
		
		return view('classes.edit', compact('class','locations'));
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
		$class = Classe::findOrFail($id);
		$class->fill($request->all());
		$class->location_id = $request->location_id;
		$class->save();
		
		return Redirect::to('admin/classes');
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
		
		return Redirect::to('admin/classes');
    }
	
	public function editAttendees($id) {
		$class = Classe::findOrFail($id);
		
		return view('classes.attendees', compact('class'));
	}
	
	public function rejectAttendee($id, $user_id) {
		$class = Classe::findOrFail($id);
		
		$class->all_attendees()->updateExistingPivot($user_id, ['rejected' => 1]);
		
		return Redirect::to('admin/classes/' . $id . '/edit/attendees');	
	}
	
	public function acceptAttendee($id, $user_id) {
		$class = Classe::findOrFail($id);
		
		$class->all_attendees()->updateExistingPivot($user_id, ['rejected' => 0]);
		
		return Redirect::to('admin/classes/' . $id . '/edit/attendees');	
	}
}
