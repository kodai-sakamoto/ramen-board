<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    
    protected $fillable = ['user_id', 'ramen_img', 'evaluation', 'store_name', 'location', 'type', 'comment'];
    
    
    
    
    
    public function user()
    {
      return $this->belongTo(User::class);  
    }
    
    
    
    
    
    
     
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorite', 'favorite_id', 'user_id')->withTimestamps();
    }
    
}
