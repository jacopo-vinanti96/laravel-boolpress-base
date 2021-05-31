<h1>Someone commented on your post</h1>
<div>
	Link to post:
	<a href="{{ route('admin.posts.show', ['post' => $post->id]) }}">{{$post->title}}</a>
</div>