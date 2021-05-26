{{-- Si importa il layout base --}}
@extends('layouts.base')
{{-- Titolo della pagina --}}
@section('pageTitle')
    {{ $post['title'] }} | Details
@endsection
{{-- Body --}}
@section('body')
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary d-block">Back to home page</a>
    <h2 class="d-inline-block">{{ $post['title'] }}</h2>
    <a href="{{ route('admin.posts.edit', [ 'post' => $post->id ]) }}" class="btn btn-primary">Edit</a>
    <form class="d-inline-block" action="{{route('admin.posts.destroy', [ $post->id ])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <ul>
        <li>
            Author: {{ $post['author'] }}
        </li>
        <li>
            Tags: 
            @foreach ($post->tags as $tag)
                {{ $tag->name }}
            @endforeach
        </li>
        <li>
            Content: {{ $post['content'] }}
        </li>
        <li>
            Date: {{ $post['date'] }}
        </li>
        <li>
            Public: {{ $post['public'] == true? 'yes' : 'no' }}
        </li>
        <li>
            Image: 
            <img src="{{ $post['image'] }}" alt="post image">
        </li>
    </ul>
@endsection
