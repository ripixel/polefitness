<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\LocationRequest;
use App\Http\Controllers\Controller;
use App\Location;
use Auth;

class LocationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(LocationRequest $request)
    {
        $location = new Location($request->all());
		$location->save();
		
		return Redirect::to('admin/locations')->with("good", "Successfully created location.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
		
		return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(LocationRequest $request, $id)
    {
        $location = Location::findOrFail($id);
		$location->fill($request->all());
		$location->save();
		
		return Redirect::back()->with("good", "Successfully updated location.");
    }
}