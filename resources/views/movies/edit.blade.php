
@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
    <h1>Edit Movie</h1>
    
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $movie->title }}" required>
        </div>
        <div class="mb-3">
            <label for="poster" class="form-label">Poster URL</label>
            <input type="text" id="poster" name="poster" class="form-control" value="{{ $movie->poster }}">
        </div>
        <div class="mb-3">
            <label for="intro" class="form-label">Intro</label>
            <input type="text" id="intro" name="intro" class="form-control" value="{{ $movie->intro }}" required>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" id="release_date" name="release_date" class="form-control" value="{{ $movie->release_date }}" required>
        </div>
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select id="genre_id" name="genre_id" class="form-select" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection
