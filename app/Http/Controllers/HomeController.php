<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classe;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
		$classes_available = Classe::Upcoming()->where('date','<', Carbon::now()->next(Carbon::MONDAY))->count();
        return view('welcome', compact('classes_available'));
    }
}
