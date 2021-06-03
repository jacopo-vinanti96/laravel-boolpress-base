{{-- Si importa il layout base --}}
@extends('layouts.guest')
{{-- Titolo della pagina --}}
@section('pageTitle')
    Read {{ $post['title'] }}
@endsection
{{-- Body --}}
@section('main')
    <div class="container">
        <h2>{{ $post['title'] }}</h2>
        <span>Written by <a href="#">{{ $post['author'] }}</a></span> 
        @foreach ($post->tags as $tag)
            <a href="#">{{ $tag->name }}</a>    
        @endforeach
        <img class="d-block" src="{{ asset('storage/' . $post->image) }}" alt="post image">
        <p>{{ $post['content'] }}</p>
        Date: {{ $post['date'] }}
        @if ( count($post->comments) !== 0 )
            <h3>Comments</h3>
            <h4>Aggiungi Commento</h4>
            <form action="{{ route('guest.add_comment', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="title">Name*</label>
                    <input type="text" class="form-control" id="author" name="author" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="content">Comment*</label>
                    <textarea class="form-control"  name="content" id="content" cols="30" rows="4" placeholder="Comment"></textarea>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <ul class="list-unstyled">
                @foreach ( $post->comments as $comment )
                <li>
                    <a href="#">{{ $comment->author }}</a>
                    <p>{{ $comment->content }}</p>
                </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
