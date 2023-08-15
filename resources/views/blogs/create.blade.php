@extends('layouts.app')

@section('content')
    <h1>Create New Blog Post</h1>

    <form action="{{ route('blogs.store') }}" method="post">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" required>
        <br>
        <label for="content">Blog Content</label>
        <textarea name="content" required></textarea>
        <br>
        <label for="excerpt">Excerpt(Headline)</label>
        <textarea name="excerpt" required></textarea>
        <br>
        <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>

        <br>
        <button type="submit">Create</button>
    </form>

    <a href="{{ route('blogs.index') }}">Back to List</a>
@endsection
