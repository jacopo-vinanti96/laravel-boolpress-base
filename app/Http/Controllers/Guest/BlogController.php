<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CommentMail;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('public', true)->orderBy('date', 'desc')->get();
        $tags = Tag::all();
        return view('guest.index', compact('posts', 'tags'));
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $tags = Tag::all();
        
        if ( $post == null ) {
            abort(404);
        }
        return view('guest.show_post', compact('post', 'tags'));
    }

    public function addComment(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'string|max:100',
            'content' => 'required|string',
        ]);

        $newComment = new Comment();
        $newComment->author = $request->author;
        $newComment->content = $request->content;
        $newComment->time = date('Y-m-d');
        $newComment->post_id = $post->id;

        $newComment->save();

        Mail::to('pippo@gmail.com')->send(new CommentMail($post));

        return back();
    }
}
