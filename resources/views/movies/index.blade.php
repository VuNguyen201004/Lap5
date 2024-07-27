@extends('layouts.app')

@section('title', 'Movies List')

@section('content')
    <h1 class="mb-4">Movies List</h1>

    <!-- Tìm kiếm phim -->
    <form action="{{ route('movies.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control" placeholder="Search by title">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Thông báo thành công -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('movies.create') }}" class="btn btn-success mb-3">Add New Movie</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Poster</th>
                <th>Intro</th>
                <th>Release Date</th>
                <th>Genre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>
                        @if($movie->poster)
                            <img src="{{ asset($movie->poster) }}" alt="{{ $movie->title }}" width="100">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $movie->intro }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->genre->name }}</td>
                    <td style="display: flex">
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
