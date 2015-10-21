<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Mail;

use App\Http\Requests;
use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Classe;
use App\User;
use App\Token;
use Auth;
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
	
	public function showLogin()
	{
		// show the form
		return view('login');
	}
	
	public function showForgotten()
	{
		// show the form
		return view('forgotten');
	}
	
	public function doForgotten(Request $request)
	{	
		$user = User::where('email','=',$request->email)->first();
		if($user != null) {
			$token = new Token();
			$token->token = md5(uniqid(rand(), true));
			$token->type = "Password Reset";
			$user->tokens()->save($token);
		
			Mail::send('emails.passwordreset', ['token' => $token->token], function ($m) use ($user) {
				$m	->to($user->email, $user->fullname)
					->subject('UoS Pole Fitness Society Password Reset')
					->from('noreply@uospolefitness.co.uk', 'UoS Pole Fitness Society');
			});
		}
		
		return Redirect::to('home')->with("good","Please check your inbox for an email from us.");
	}
	
	public function doPasswordReset($token)
	{
		$token = Token::where('token','=',$token)->first();
		if($token == null) {
			return Redirect::to('home')->with("bad", "Token expired, does not exist, or has already been used. Please check, and try again.");
		}
		$user = $token->user()->first();
		Auth::login($user);
		$token->delete();
		
		return view('users.edit', compact('user'))->with("good", "Successfully logged in using token - please change your password now");
	}
	
	public function doLogin(Request $request)
	{	
		if(Auth::attempt([
			'email' => $request->email,
			'password' => $request->password
		])) {
			return Redirect::to('profile')->with("good", "Successfully logged in.");
		} else {
			return Redirect::back()->with("bad", "Failed login - check your information.");
		}
	}
	
	public function doLogout()
	{	
		Auth::logout();
		return Redirect::to('home')->with("good", "Successfully logged out.");
	}
	
	public function showRegister()
	{
		// show the form
		return view('register');
	}
	
	public function doRegister(RegisterRequest $request)
	{	
		$user = new User();
		$user->first_name = $request->first_name;
		$user->last_name = $request->last_name;
		$user->email = $request->email;
		$user->admin = False;
		$user->member = False;
		$user->picture_link = $request->picture_link;
		$user->email_confirmed = True;
		$user->password = bcrypt($request->password);
		$user->save();
		
		return Redirect::to('login')->with("good", "Successfully registered.");
	}
}
