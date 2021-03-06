<?php

namespace App\Helpers;


use App\Email;
use Mail;

class EmailHelper
{
	const POLE_EMAIL = 'pole.fitness@sheffield.ac.uk';

	const PASSWORD_RESET = 1;
	const THREE_STRIKES = 2;
	const GOOD_TRANSACTION_CHANGE = 3;
	const BAD_TRANSACTION_CHANGE = 4;
	const ACCEPT_ATTENDEE = 5;
	const REJECT_ATTENDEE = 6;
	const BOOKING_COMPLETE = 7;
	const REMOVE_ATTENDEE = 8;
	const CANCEL_CLASS_USER = 9;
	const CANCEL_CLASS_ADMIN = 10;
	const PURCHASE_COMPLETE = 11;
	const ADMIN_ACTION_COMPLETE = 12;
	const GUEST_BOOKING_COMPLETE = 13;

	static private function replaceTags($content, $tags)
	{
		foreach($tags as $tag => $value) {
			$content = str_replace("[[" . $tag . "]]", $value, $content);
		}

		return $content;
	}

	static public function sendEmail($id, $tags, $to)
	{
		$template = Email::findOrFail($id);
		$subject = EmailHelper::replaceTags($template->subject, $tags);
		$content = EmailHelper::replaceTags($template->content, $tags);

		Mail::send('emails.echo', ['html' => $content], function($m) use ($to, $subject) {
			$m 	->to($to)
				->subject($subject)
				->from('noreply@uospolefitness.co.uk', 'UoS Pole Fitness Society');
		});
	}
}
