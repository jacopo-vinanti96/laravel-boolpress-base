@extends('layouts.admin_form')
{{-- Titlo della pagina --}}
@section('pageTitle')
    Create a new post
@endsection
{{-- Corpo della pagina --}}
@section('title')
    <h2>New post</h2>
@endsection

@section('formAction')"{{ route('admin.posts.store') }}"@endsection

@section('formMethod')"POST"@endsection

@section('method')@method('POST')@endsection

@section('postTitle')
    value="{{ old('title') }}"
@endsection

@section('postAuthor')
    value="{{ old('author') }}"
@endsection

@section('postDate')
    value="{{ old('date') }}"
@endsection

@section('postContent')
    {{ old('content') }}
@endsection

@section('postImage')
    value="{{ old('image') }}"
@endsection

@section('postTags')
    <div class="form-check">
        @foreach ( $tags as $tag )
        <input type="checkbox" name="tags[]" id="{{ $tag->name }}" value="{{ $tag->id }}" {{ old('checked') }}>
        <label for="{{ $tag->name }}">{{ $tag->name }}</label>
        @endforeach
    </div>
@endsection

@section('postPublic')
    <div class="form-check">
        <input type="checkbox" name="public" id="public" value="1" {{ old('checked') }}>
        <label for="public">Public</label>
    </div>
@endsection