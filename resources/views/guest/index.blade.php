{{-- Si importa il layout base --}}
@extends('layouts.guest')
{{-- Titlo della pagina --}}
@section('pageTitle')
    The Posts
@endsection
{{-- Corpo della pagina --}}
@section('main')
    {{-- Stampa una card per ogni film --}}
    @foreach ( $posts as $post )
    <h2>{{ $post['title'] }}</h2>
    <ul>
        <li>
            Author: {{ $post['author'] }}
        </li>
        <li>
            Date: {{ $post['date'] }}
        </li>
        <a href="{{ route('guest.posts.show_post', [ $post->slug ]) }}">Post details</a>
    </ul>
    @endforeach
@endsection

