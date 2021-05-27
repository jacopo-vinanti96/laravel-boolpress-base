<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;

class CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        $comment->delete();
        $post = Post::find( $comment->post_id );

        return redirect()
        ->route( 'admin.posts.show', compact('post') )
        ->with('message', 'The comment has been deleted');
    }
}
