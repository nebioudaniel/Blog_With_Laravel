<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('likes')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the photo
        ]);

        $photoPath = $request->hasFile('photo') ? $request->file('photo')->store('public/photos') : null;

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath,
            'user_id' => auth()->id(), // Associate post with the logged-in user
        ]);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the photo
        ]);

        $photoPath = $post->photo;

        if ($request->hasFile('photo')) {
            if ($photoPath && Storage::exists($photoPath)) {
                Storage::delete($photoPath);
            }
            $photoPath = $request->file('photo')->store('public/photos');
        }

        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'photo' => $photoPath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        if ($post->photo && Storage::exists($post->photo)) {
            Storage::delete($post->photo);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    /**
     * Like a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request, Post $post)
    {
        $post->likes()->attach(auth()->id());
        return redirect()->route('posts.index')->with('success', 'Post liked.');
    }

    /**
     * Unlike a post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function unlike(Request $request, Post $post)
    {
        $post->likes()->detach(auth()->id());
        return redirect()->route('posts.index')->with('success', 'Post unliked.');
    }
}
