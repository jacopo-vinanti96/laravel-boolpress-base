{{-- Si importa il layout base --}}
@extends('layouts.base')
{{-- Titlo della pagina --}}
@section('pageTitle')
    @yield('pageTitle')
@endsection
{{-- Corpo della pagina --}}
@section('body')
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary d-block">Back to home page</a>
    @if ( $errors->any() )
        <div class="alert alert-danger">
            @foreach ( $errors->all() as $error )
                {{ $error }}
            @endforeach
        </div>
    @endif
    @yield('title')
    <form action=@yield('formAction') method=@yield('formMethod')>
        @csrf
        @yield('method')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" placeholder="Title" @yield('postTitle')>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" placeholder="Author" @yield('postAuthor')>
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="numeric" name="date" id="date" placeholder="YYYY minimum: 1900" @yield('postDate')>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="align-top" rows="4" cols="50" name="content" id="content" placeholder="Content">@yield('postContent')</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="numeric" name="image" id="image" placeholder="Image URL" @yield('postImage')>
        </div>
        
        @yield('postTags')

        @yield('postPublic')

        <input class=".btn btn-primary" type="submit" value="Send">
    </form>

@endsection