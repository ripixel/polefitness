<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;

use App\Http\Requests\ClasseRequest;
use App\Http\Requests\BookClassMembershipRequest;
use App\Http\Requests\BookClassPaymentRequest;
use App\Http\Controllers\Controller;
use App\Classe;
use App\User;
use App\Location;
use App\Membership;
use App\Transaction;
use App\Payment_Method;
use App\User_Membership;
use DB;
use Carbon\Carbon;
use Auth;
use App\Helpers\EmailHelper;

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

		$all_memberships = Membership::orderBy('created_at','desc')->get();
		$memberships = $all_memberships->lists('name', 'id');

		$admins = User::Admins()->get();
		$supervisors = $admins->lists('fullname', 'id');
		$instructors = User::Instructors()->get()->lists('fullname', 'id');

		return view('classes.create', compact('locations', 'payment_methods', 'supervisors', 'memberships', 'instructors'));
    }

    public function copy($id)
    {
        $class = Classe::findOrFail($id);
		$class->title = $class->title . " - CLONED";

		$locations = Location::lists('name','id');
		$payment_methods = Payment_Method::lists('name','id');

		$all_memberships = Membership::orderBy('created_at','desc')->get();
		$memberships = $all_memberships->lists('name', 'id');

		$admins = User::Admins()->get();
		$supervisors = $admins->lists('fullname', 'id');
		$instructors = User::Instructors()->get()->lists('fullname', 'id');

		return view('classes.clone', compact('locations','class','payment_methods', 'supervisors', 'memberships', 'instructors'));
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

		$user = Auth::user();
		$user->classes_created()->save($class);

		$payment_methods_allowed = ($request->payment_methods_allowed ?: []);
		$class->payment_methods_allowed()->sync($payment_methods_allowed);

		$memberships_allowed = ($request->memberships_allowed ?: []);
		$class->memberships_allowed()->sync($memberships_allowed);

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
		$user = Auth::user();

		if($class->date < Carbon::now()) {
			return Redirect::to('classes')->with("bad", "You can't view this class - it's already happened!");
		}

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
		$user = Auth::user();

		if($class->date < Carbon::now()) {
			return Redirect::to('classes')->with("bad", "You can't view this class - it's already happened!");
		}

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

		$all_memberships = Membership::orderBy('created_at','desc')->get();
		$memberships = $all_memberships->lists('name', 'id');

		$admins = User::Admins()->get();
		$supervisors = $admins->lists('fullname', 'id');
		$instructors = User::Instructors()->get()->lists('fullname', 'id');

        $class = Classe::findOrFail($id);

		return view('classes.edit', compact('class','locations','payment_methods', 'supervisors', 'memberships', 'instructors'));
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

		$memberships_allowed = ($request->memberships_allowed ?: []);
		$class->memberships_allowed()->sync($memberships_allowed);

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
		$users = $class->all_attendees()->get();

		foreach($users as $user) {
			$tags = [
				"first_name" => $user->first_name,
				"last_name" => $user->last_name,
				"class_title" => $class->title,
				"class_date" => $class->date,
				"class_end_date" => $class->end_date,
				"location" => $class->location->name
			];

			EmailHelper::sendEmail(EmailHelper::CANCEL_CLASS_USER, $tags, $user->email);
		}

		$adminTags = [
			"class_title" => $class->title,
			"class_date" => $class->date,
			"class_end_date" => $class->end_date,
			"location" => $class->location->name
		];

		EmailHelper::sendEmail(EmailHelper::CANCEL_CLASS_ADMIN, $adminTags, $class->instructor->email);
		EmailHelper::sendEmail(EmailHelper::CANCEL_CLASS_ADMIN, $adminTags, $class->supervisor->email);
		EmailHelper::sendEmail(EmailHelper::CANCEL_CLASS_ADMIN, $adminTags, EmailHelper::POLE_EMAIL);

		$class->all_attendees()->detach();
		$class->payment_methods_allowed()->detach();
		$class->memberships_allowed()->detach();
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

		$user = User::findOrFail($user_id);
		$tags = $this->getEmailTagsRejectAcceptAttendee($user, $class);

		EmailHelper::sendEmail(EmailHelper::REJECT_ATTENDEE, $tags, $user->email);

		return Redirect::back()->with("good", "Successfully rejected user.");
	}

	public function acceptAttendee($id, $user_id) {
		$class = Classe::findOrFail($id);

		$class->all_attendees()->updateExistingPivot($user_id, ['rejected' => 0]);

		$user = User::findOrFail($user_id);
		$tags = $this->getEmailTagsRejectAcceptAttendee($user, $class);

		EmailHelper::sendEmail(EmailHelper::ACCEPT_ATTENDEE, $tags, $user->email);

		return Redirect::back()->with("good", "Successfully accepted user.");
	}

	private function getEmailTagsRejectAcceptAttendee($user, $class) {
		return $tags = [
			"first_name" => $user->first_name,
			"last_name" => $user->last_name,
			"class_title" => $class->title,
			"class_date" => $class->date,
			"class_end_date" => $class->end_date,
			"location" => $class->location->name
		];
	}

	public function bookClassMembership($class_id, $membership_id) {
		$user = Auth::user();
		$membership = Membership::findOrFail($membership_id);
		$class = Classe::findOrFail($class_id);

		return view('classes.book_membership', compact('user', 'membership','class'));
	}

	public function bookClassMembershipComplete(BookClassMembershipRequest $request) {

		$user = Auth::user();

		$class = Classe::findOrFail($request->classe_id);
		$user_membership_id = DB::table('user_memberships')
			->join('transactions', 'user_memberships.transaction_id', '=', 'transactions.id')
			->where('transactions.failed','!=',1)
			->where('transactions.strike','!=',1)
			->where('user_memberships.membership_id','=', $request->membership_id)
			->where('user_memberships.user_id','=', $user->id)
			->where('user_memberships.spaces_left','>',0)
			->select('user_memberships.id')->first();

		$user_membership = User_Membership::findOrFail($user_membership_id->id);

		DB::table('classe_user')->insert([
			'classe_id' => $class->id,
			'user_id' => $user->id,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'used_free_space' => 1,
			'user_membership_id' => $user_membership->id,
			'rejected' => 0
		]);

		$user_membership->spaces_left = $user_membership->spaces_left - 1;
		$user_membership->save();

		$membership = Membership::findOrFail($request->membership_id);

		$tags = [
			"payment_method" => $membership->name,
			"cost" => "Free"
		];

		$this->emailBookingComplete($user, $class, $tags);

		return view('classes.show', compact('class','user'));
	}

	public function bookClassPayment($class_id, $payment_method_id) {
		$user = Auth::user();
		$payment_method = Payment_Method::findOrFail($payment_method_id);
		$class = Classe::findOrFail($class_id);

		return view('classes.book_payment', compact('user', 'payment_method','class'));
	}

	public function bookClassPaymentComplete(BookClassPaymentRequest $request) {

		$user = Auth::user();

		$class = Classe::findOrFail($request->classe_id);
		$payment_method = Payment_Method::findOrFail($request->payment_method_id);

		$transaction = new Transaction();
		$transaction->payment_method_id = $payment_method->id;
		$transaction->name = "Class Payment";
		$transaction->description = $class->title . " on " . $class->date;
		if($payment_method->has_cost) {
			if($user->member || $user->admin) {
				$transaction->amount = $class->cost_member;
			} else {
				$transaction->amount = $class->cost;
			}
		} else {
			$transaction->amount = 0;
		}
		$user->transactions()->save($transaction);


		DB::table('classe_user')->insert([
			'classe_id' => $class->id,
			'user_id' => $user->id,
			'created_at' => Carbon::now(),
			'updated_at' => Carbon::now(),
			'used_free_space' => 0,
			'transaction_id' => $transaction->id,
			'rejected' => 0
		]);

		$tags = [
			"payment_method" => $payment_method->name,
			"cost" => sprintf('£%01.2f', $transaction->amount)
		];

		$this->emailBookingComplete($user, $class, $tags);

		return view('classes.show', compact('class','user'));
	}

	private function emailBookingComplete($user, $class, $tagsIn) {
		$tags = array_merge(
				[
					"first_name" => $user->first_name,
					"last_name" => $user->last_name,
					"class_title" => $class->title,
					"class_date" => $class->date,
					"class_end_date" => $class->end_date,
					"location" => $class->location->name
				],
				$tagsIn
			);

		EmailHelper::sendEmail(EmailHelper::BOOKING_COMPLETE, $tags, $user->email);
	}

	public function removeFromClassPublic($classe_id) {

		$user = Auth::user();
		$class = Classe::findOrFail($classe_id);

		$this->doRemoveFromClass($class, $user);

		return Redirect::back()->with("good", "Successfully removed from class.");
	}

	public function removeFromClassAdmin($classe_id, $user_id) {

		$user = User::findOrFail($user_id);
		$class = Classe::findOrFail($classe_id);

		$this->doRemoveFromClass($class, $user);

		$tags = [
					"first_name" => $user->first_name,
					"last_name" => $user->last_name,
					"class_title" => $class->title,
					"class_date" => $class->date,
					"class_end_date" => $class->end_date,
					"location" => $class->location->name
				];

		EmailHelper::sendEmail(EmailHelper::REMOVE_ATTENDEE, $tags, $user->email);

		return Redirect::back()->with("good", "Successfully removed from class.");
	}

	private function doRemoveFromClass($class, $user) {
		$classe_user_row = DB::table('classe_user')
			->where('classe_id','=',$class->id)
			->where('user_id','=',$user->id)
			->select('transaction_id', 'used_free_space', 'user_membership_id')
			->first();

		DB::table('classe_user')
			->where('classe_id','=',$class->id)
			->where('user_id','=',$user->id)
			->delete();

		if($classe_user_row->used_free_space == True) {
			$user_membership = User_Membership::findOrFail($classe_user_row->user_membership_id);
			$user_membership->spaces_left = $user_membership->spaces_left + 1;
			$user_membership->save();
		} else {
			$transaction = Transaction::findOrFail($classe_user_row->transaction_id);
			$transaction->delete();
		}
	}
}
