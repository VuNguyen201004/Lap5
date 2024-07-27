@extends('layouts.app')

@section('title', 'Them moi phim')

@section('content')
    <h1>Add New Movie</h1>
    
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="poster" class="form-label">Poster Image</label>
            <input type="file" id="poster" name="poster" class="form-control">
        </div>
        <div class="mb-3">
            <label for="intro" class="form-label">Intro</label>
            <input type="text" id="intro" name="intro" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="release_date" class="form-label">Release Date</label>
            <input type="date" id="release_date" name="release_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select id="genre_id" name="genre_id" class="form-select" required>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection
