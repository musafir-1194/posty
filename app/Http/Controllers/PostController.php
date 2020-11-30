<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
    }

    public function index()
    {
        // $posts = Post::get();
        // $posts = Post::paginate(20);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);

        return back();
    }

    public function destroy(Post $post)
    {
        // if ($post->ownedBy(auth()->user()))
        // {
        //     dd('no');
        // }

        $this->authorize('delete', $post);
        $post->delete();

        return back();
    }
}
