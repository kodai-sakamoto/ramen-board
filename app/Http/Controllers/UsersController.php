<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Post; // 追加

class UsersController extends Controller
{
    
    
    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->get();

        $data = [
            'user' => $user,
            'posts' => $posts,
        ];

        return view('users.show', $data);
    }
    
    
    
   
}
