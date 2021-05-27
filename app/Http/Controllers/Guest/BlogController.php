<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('public', true)->orderBy('date', 'desc')->get();
        $tags = Tag::all();
        return view('guest.index', compact('posts', 'tags'));
    }
}
