<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Classe;
use App\Blog_Item;
use App\Transaction;
use App\Location;
use App\Membership;

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
	
	public function transactions() {
		
		$subtitle = "Showing All Transactions";
		$transactions = Transaction::orderBy('created_at','desc')->get();
		
		return view('transactions.admin', compact('transactions', 'subtitle'));
	}
	
	public function transactionsSuccessful() {
		
		$subtitle = "Showing Successful Transactions";
		$transactions = Transaction::Successful()->orderBy('created_at','desc')->get();
		
		return view('transactions.admin', compact('transactions', 'subtitle'));
	}
	
	public function transactionsFailed() {
		
		$subtitle = "Showing Failed Transactions";
		$transactions = Transaction::Failed()->orderBy('created_at','desc')->get();
		
		return view('transactions.admin', compact('transactions', 'subtitle'));
	}
	
	public function transactionsRejected() {
		
		$subtitle = "Showing Rejected Transactions";
		$transactions = Transaction::Rejected()->orderBy('created_at','desc')->get();
		
		return view('transactions.admin', compact('transactions', 'subtitle'));
	}
	
	public function transactionsAwaiting() {
		
		$subtitle = "Showing Awaiting Transactions";
		$transactions = Transaction::Awaiting()->orderBy('created_at','desc')->get();
		
		return view('transactions.admin', compact('transactions', 'subtitle'));
	}
	
	public function locations() {
		
		$locations = Location::orderBy('created_at','desc')->get();
		
		return view('locations.admin', compact('locations'));
	}
	
	public function memberships() {
		
		$memberships = Membership::orderBy('created_at','desc')->get();
		$subtitle = "Showing All Memberships";
		
		return view('memberships.admin', compact('memberships', 'subtitle'));
	}
	
	public function membershipsActive() {
		
		$memberships = Membership::Active()->orderBy('created_at','desc')->get();
		$subtitle = "Showing Active Memberships";
		
		return view('memberships.admin', compact('memberships', 'subtitle'));
	}
	
	public function membershipsRetired() {
		
		$memberships = Membership::Retired()->orderBy('created_at','desc')->get();
		$subtitle = "Showing Retired Memberships";
		
		return view('memberships.admin', compact('memberships', 'subtitle'));
	}
}