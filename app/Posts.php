<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fllable = ['user_id', 'ramen_img', 'evaluation', 'store_name', 'location', 'typw', 'comment'];
    
    public function user()
    {
      return $this->belongTo(User::class);  
    }
}
