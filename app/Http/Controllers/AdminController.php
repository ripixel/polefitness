<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
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
		
		$subtitle = "Showing All Classes";
		$classes = Classe::orderBy('created_at','desc')->get();
		
		return view('classes.admin', compact('classes', 'subtitle'));
	}
	
	public function classesUpc() {
		
		$subtitle = "Showing Upcoming Classes";
		$classes = Classe::orderBy('created_at','desc')->Upcoming()->get();
		
		return view('classes.admin', compact('classes', 'subtitle'));
	}
	
	public function classesMine() {
		
		$user = User::first();
		$subtitle = "Showing Classes you've posted";
		$classes = $user->classes_running()->orderBy('created_at','desc')->get();
		
		return view('classes.admin', compact('classes', 'subtitle'));
	}
	
	public function news() {
		
		$subtitle = "Showing All News Items";
		$news_items = Blog_Item::orderBy('created_at','desc')->get();
		
		return view('news.admin', compact('news_items', 'subtitle'));
	}
	
	public function newsMine() {
		
		$user = User::first();
		$subtitle = "Showing News Items you've posted";
		$news_items = $user->blog_items()->orderBy('created_at','desc')->get();
		
		return view('news.admin', compact('news_items', 'subtitle'));
	}
}