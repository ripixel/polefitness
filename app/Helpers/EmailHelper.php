<?php

namespace App\Helpers;


use App\Email;
use Mail;

class EmailHelper
{
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
		$content = EmailHelper::replaceTags($template->content, $tags);

		Mail::raw($content, function($m) use ($to, $template) {
			$m 	->to($to)
				->subject($template->subject)
				->from('noreply@uospolefitness.co.uk', 'UoS Pole Fitness Society');
		});
	}
}
