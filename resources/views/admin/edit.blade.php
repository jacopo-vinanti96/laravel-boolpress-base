@extends('layouts.admin_form')
{{-- Titlo della pagina --}}
@section('pageTitle')
    Editing {{ $post->title }}
@endsection
{{-- Corpo della pagina --}}
@section('title')
    <h2>Editing {{ $post->title }}</h2>
@endsection

@section('formAction')"{{ route('admin.posts.update', [ $post->id ]) }}"@endsection

@section('formMethod')"POST"@endsection

@section('method')@method('PUT')@endsection

@section('postTitle')
    value="{{ old('title') ? old('title') : $post->title }}"
@endsection

@section('postAuthor')
    value="{{ old('author') ? old('author') : $post->author }}"
@endsection

@section('postDate')
    value="{{ old('date') ? old('date') : $post->date }}"
@endsection

@section('postContent')
    {{ old('content') ? old('content') : $post->content }}
@endsection

@section('postImage')
    value="{{ old('image') ? old('image') : $post->image }}"
@endsection

@section('postTags')
    <div class="form-check">
        @foreach ( $tags as $tag )
        <input type="checkbox" name="tags[]" id="{{ $tag->name }}" value="{{ $tag->id }}" {{ $post->tags->contains( $tag )? 'checked' : '' }}>
        <label for="{{ $tag->name }}">{{ $tag->name }}</label>
        @endforeach
    </div>
@endsection

@section('postPublic')
    <div class="form-check">
        <input type="checkbox" name="public" id="public" value="1" {{ $post->public == true? 'checked' : '' }}>
        <label for="public">Public</label>
    </div>
@endsection