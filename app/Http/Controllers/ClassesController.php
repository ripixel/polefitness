<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classe;
use App\User;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $class = Classe::where('id', $id)->first();
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
        $class = Classe::where('id', $id)->first();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
