<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Resource controller for the various content I'll be displaying on the website.
 * RC's are specifically designed to handle CRUD operations, their naming conventions map to RESTful routes
 * Be sure to add resource route declaration to the routes file
 *
 * Resource controllers are more consistent and conventional,
 * and they provide reusable methods for common actions like
 * index (listing), create, store (creation), show (view), edit, update, and destroy
 * ideal for CRUD based resources similar to the ones I'll have on this site.
 */

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all blog posts from the database and pass them to the view
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Show the form for creating a new blog post
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request->title);

        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'excerpt' => 'required',
            'user_id' => 'required',
            'slug' => 'required',
        ]);

        // Create a new blog post and save it to the database
        Blog::create($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog post created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Retrieve a specific blog post by ID and pass it to the view
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieve a specific blog post by ID and pass it to the edit view
        $blog = Blog::findOrFail($id);
        return view('blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            // Add validation rules for other fields
        ]);

        // Find the blog post by ID and update it with the validated data
        $blog = Blog::findOrFail($id);
        $blog->update($validatedData);

        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the blog post by ID and delete it
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully.');
    }
}
