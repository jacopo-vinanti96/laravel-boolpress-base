{{-- Si importa il layout base --}}
@extends('layouts.base')
{{-- Titlo della pagina --}}
@section('pageTitle')
    Posts index - Admin
@endsection
{{-- Corpo della pagina --}}
@section('body')
    {{-- Rotta per andare alla sezione "aggiungi un post" --}}
    <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">Add a post</a>
    {{-- Se l' utente viene rimandato alla index e la creazione ha avuto successo, stampa il messaggio --}}
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
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
        <li>
            Public: {{ $post['public'] == true? 'yes' : 'no' }}
        </li>
        <a href="{{ route('admin.posts.show', [ $post->id ]) }}" >Post details</a>
    </ul>
    @endforeach
@endsection

