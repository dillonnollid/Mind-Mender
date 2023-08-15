@extends('layouts.app')

@section('content')
    <h1>Edit Blog Post</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $blog->title }}" required>
        <br>
        <label for="content">Content</label>
        <textarea name="content" required>{{ $blog->content }}</textarea>
        <!-- Add other fields here as needed -->
        <br>
        <button type="submit">Update</button>
    </form>

    <a href="{{ route('blogs.show', $blog->id) }}">Cancel</a>
@endsection
