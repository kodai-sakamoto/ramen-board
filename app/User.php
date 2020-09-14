<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function posts()
    {
    return $this->hasMany(Post::class);
    }
    
    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorite', 'user_id', 'favorite_id')->withTimestamps();
    }
    
    public function favorite($postId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_favorites($postId);
        // 相手が自分自身ではないかの確認
        
    
        if ($exist) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->favorites()->attach($postId);
            return true;
        }
    }
    
    public function unfavorite($postId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_favorites($postId);
        
    
        if ($exist) {
            // 既にフォローしていればフォローを外す
            $this->favorites()->detach($postId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_favorites($postId)
    {
        return $this->favorites()->where('favorite_id', $postId)->exists();
    }

}
