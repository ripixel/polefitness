<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	const PASSWORD_RESET = 1;

    protected $table = 'emails';

	protected $fillable = ['subject', 'content'];
}
