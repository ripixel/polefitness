<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog_Item extends Model
{
    public function user() {
        return $this->belogsTo('App\User');
    }
}
