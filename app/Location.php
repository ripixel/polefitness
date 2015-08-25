<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	protected $fillable = ['name', 'address', 'picture_link'];
	
    public function classes() {
        return $this->hasMany('App\Classe');
    }
}
