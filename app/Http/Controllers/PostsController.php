<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use Illuminate\Support\Facades\Storage;

use App\User;

class PostsController extends Controller
{
    
    
    
    
    
    public function index()
    {

     $posts = Post::withCount('favorites')->orderBy('favorites_count', 'desc')->paginate(20);

        
       
        
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }
    
    
    
    
    
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            
        'ramen_img' => 'required|image',
        'store_name' => 'required|max:10',
        'comment' => 'required|max:50',
        ]);
        
        

        $image = $request->file('ramen_img');

        /**
         * 自動生成されたファイル名が付与されてS3に保存される。
         * 第三引数に'public'を付与しないと外部からアクセスできないので注意。
         */
        $path = Storage::disk('s3')->putFile('ramen_img', $image, 'public');

        /* 上記と同じ */
        // $path = $image->store('', 's3');

        /* 名前を付与してS3に保存する */
        // $filename = 'hoge.jpg';
        // $path = Storage::disk('s3')->putFileAs('myprefix', $image, $filename, 'public');

        /* ファイルパスから参照するURLを生成する */
        $url = Storage::disk('s3')->url($path);
        
        $request->user()->posts()->create([
            'ramen_img' => $url,
            'evaluation' => $request->evaluation,
            'store_name' => $request->store_name,
            'location' => $request->location,
            'type' => $request->type,
            'comment' =>$request->comment,
        ]);
        
        return redirect('/');
    }
    
    
    
    
    
    
    
    
    public function favorites($id)
    {
        $post = User::find($id);
        $favorites = $post->favorites()->paginate(10);

        $data = [
            'post' => $post,
            'favorites' => $favorites,
        ];

        $data += $this->counts($post);

        return view('favorite.favorite', $data);
    }
    
    
    
    
    
    
    
    
    public function kensaku(Request $request)
    {
        
       $query = Post::query();
        if (isset($request->area)) {
            $query->where('location', $request->area);
            
        }
        if (isset($request->type)) {
            $query->where('type', $request->type);
        }
        if($request->area != "") {
          $request = Post::all();
        }
        
        
        $posts = $query->get();
        return view('posts.index', [
            'posts' => $posts,
        ]);

        
    }
    
    public function destroy($id)
    {
        $post = \App\Post::find($id);

        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        return back();
    }
    
}
