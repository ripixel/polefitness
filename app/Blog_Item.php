<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_Item extends Model
{
    protected $table = 'blog_items';
	
	protected $fillable = ['title', 'body', 'picture_link'];
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
