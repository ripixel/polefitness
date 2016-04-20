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
use Input;
use Auth;

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

	public function classesOutstanding() {

		$subtitle = "Showing Classes with Outstanding Payments";
		$classes = Classe::orderBy('created_at','desc')->get();
		foreach($classes as $key => $class) {
			if($class->paymentStatus() == 'Payments Complete') {
				$classes->forget($key);
			}
		}

		return view('classes.admin', compact('classes', 'subtitle'));
	}

	public function classesMine() {

		$user = Auth::user();
		$subtitle = "Showing Classes you've created";
		$classes = $user->classes_created()->orderBy('created_at','desc')->get();

		return view('classes.admin', compact('classes', 'subtitle'));
	}

	public function classesMineSupervisor() {

		$user = Auth::user();
		$subtitle = "Showing Classes you're supervising";
		$classes = $user->classes_supervising()->orderBy('created_at','desc')->get();

		return view('classes.admin', compact('classes', 'subtitle'));
	}

	public function news() {

		$subtitle = "Showing All News Items";
		$news_items = Blog_Item::orderBy('created_at','desc')->get();

		return view('news.admin', compact('news_items', 'subtitle'));
	}

	public function newsMine() {

		$user = Auth::user();
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

	public function transactionsStrike() {

		$subtitle = "Showing Strike Transactions";
		$transactions = Transaction::Strike()->orderBy('created_at','desc')->get();

		return view('transactions.admin', compact('transactions', 'subtitle'));
	}

	public function transactionsResolved() {

		$subtitle = "Showing Resolved Transactions";
		$transactions = Transaction::Resolved()->orderBy('created_at','desc')->get();

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

	public function users() {

		$users = User::orderBy('first_name','asc')->get();
		$subtitle = "Showing All Users";

		return view('users.admin', compact('users', 'subtitle'));
	}

	public function usersAdmins() {

		$users = User::Admins()->orderBy('first_name','asc')->get();
		$subtitle = "Showing Administrators";

		return view('users.admin', compact('users', 'subtitle'));
	}

	public function userSearch(Request $request) {
		$first_name = $request->first_name;
		$last_name = $request->last_name;

		$users = User::where('first_name','LIKE',"%{$first_name}%")->where('last_name','LIKE',"%{$last_name}%")->orderBy('first_name','asc')->get();
		$subtitle = "Showing User Search for: " . $first_name . ' ' . $last_name;

		return view('users.admin', compact('users', 'subtitle'));
	}
}