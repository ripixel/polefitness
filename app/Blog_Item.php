<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_Item extends Model
{
    protected $table = 'blog_items';
    
    public function user() {
        return $this->belongsTo('App\User');
    }
}
