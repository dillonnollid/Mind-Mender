@extends('layouts.app')

@section('content')
    <h1>All Blog Posts</h1>

    <ul>
        @foreach($blogs as $blog)
            <li>
                <a href="{{ route('blogs.show', $blog->id) }}">{{ $blog->title }}</a>
            </li>
        @endforeach
    </ul>

    <a href="{{ route('blogs.create') }}">Create New Blog Post</a>
@endsection
