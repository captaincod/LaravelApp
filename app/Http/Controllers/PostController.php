<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Model\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post:://where('status','published')
            ->orderBy('date','desc')->paginate();
        return view('posts', compact('posts'));
    }

    public function show(Request $request, $slug)
    {
        $post = Post::where('slug',$slug)
            //->where('status','published')
            ->firstOrFail();

        $post->load([
        'comments' => function($query){
            $query->where('status','approved');
            $query->orderBy('created_at','desc');
        },
        ]);


        return view('post', compact('post'));
    }
    public function postComment(Request $request)
    {
        /*$this->validate($request,[
            'post_id' => 'required',
            'author' => 'required',
            'comment' => 'required',
        ]);
        $data = ['author' => $request->author, 'comment'=> $request->comment]*/
        
        $request->validate([
            'post_id' => 'required',
            'author' => 'required',
            'comment' => 'required',
        ])

        //$post = Post::where('id',$post_id)->where('status','published')->firstOrFail();
        //$post = Post::findOrFail($post_id);

        $post = Post::where('id',$post_id)
            //->where('status','published')
            ->firstOrFail();
        /*
        $post = Post::where([
            'id' => $post_id,
            'status' => 'published',
        ]);
        */

        /* 
        $post->comments()->delete();  DELETE FROM comments WHERE post_id
        $post->comments()->update([
            'author'=> 'Test',
        ]);
        */ 

        $post->comments()->create([
            'author' => $request->author,
            'comment' => $request->comment,
        ]);
        return redirect($post->url);  // не забыть так заменить в posts.blade
    }
}