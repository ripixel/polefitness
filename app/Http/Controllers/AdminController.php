<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classe;
use App\Blog_Item;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {		
		return view('admin_home');
    }
	
	public function classes() {
		
		$classes = Classe::orderBy('created_at','desc')->get();
		
		return view('classes.admin', compact('classes'));
	}
	
	public function news() {
		
		$news_items = Blog_Item::orderBy('created_at','desc')->get();
		
		return view('news.admin', compact('news_items'));
	}
}