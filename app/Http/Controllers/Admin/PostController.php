<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    protected $validateFields = [];

    public function __construct() {
        $this->validateFields = [
            'title' => 'required | string | unique:posts',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'author' => 'required | string',
            'content' => 'required | string',
            'date' => 'required | date_format:Y-m-d'
        ];
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('admin.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( Request $request )
    {
        $request->validate( $this->validateFields );
        $data = $request->all();

        if ( isset($data['image']) ) {
            $data['image'] = Storage::disk('public')->put('images', $data['image']);
        }

        $data['public'] = !isset( $data['public'] ) ? 0 : 1;

        $data['slug'] = Str::slug ($data['title'], '-' );

        $newpost = Post::create( $data );

        if ( isset($data['tags']) ) {
            $newpost->tags()->attach( $data['tags'] );
        }

        return redirect()->route( 'admin.posts.show', [ 'post' => $newpost ] );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('admin.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validation = $this->validateFields;
        $validation['title'] .= ',title,' . $post->id;

        $request->validate($validation);

        $data = $request->all();

        $data['public'] = !isset($data['public']) ? 0 : 1;

        $data['slug'] = Str::slug($data['title'], '-');

        $post->update($data);

        $post->tags()->sync($data['tags']);

        return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()
        ->route('admin.posts.index')
        ->with('message', '"' . $post->title . '"' . ' has been deleted');
    }
}
