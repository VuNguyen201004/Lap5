@extends('layouts.app')

@section('title', 'Movie Details')

@section('content')
    <h1>{{ $movie->title }}</h1>
    
    @if($movie->poster)
        <img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" class="img-fluid mb-3">
    @else
        <p>No Image</p>
    @endif

    <p><strong>Intro:</strong> {{ $movie->intro }}</p>
    <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
    <p><strong>Genre:</strong> {{ $movie->genre->name }}</p>

    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a

