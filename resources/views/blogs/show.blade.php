@extends('layouts.app')

@section('content')
    <h1>{{ $blog->title }}</h1>
    <p> {{ $blog->content }}</p>
    <!-- Display other attributes as needed -->

    <a href="{{ route('blogs.edit', $blog->id) }}">Edit</a>

    <form action="{{ route('blogs.destroy', $blog->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ route('blogs.index') }}">Back to List</a>
@endsection
