@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-4xl font-bold">Posts</h1>
        @auth
            <a href="{{ route('posts.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Post</a>
        @endauth
    </div>

    @if ($posts->count())
        @foreach ($posts as $post)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
                @if ($post->photo)
                    <img src="{{ Storage::url($post->photo) }}" alt="Post Photo" class="w-full h-64 object-cover">
                @endif
                <div class="p-6">
                    <h3 class="text-2xl font-semibold mb-2">{{ $post->title }}</h3>
                    <p class="text-gray-700 mb-4">{{ $post->description }}</p>
                    <p class="text-sm text-gray-500 mb-4">Posted on {{ $post->created_at->format('d M Y') }}</p>

                    @auth
                        @if (!$post->likes->where('user_id', auth()->id())->isEmpty())
                            <form action="{{ route('posts.unlike', $post) }}" method="POST" class="inline">
                                @csrf {{-- for security --}}
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Unlike</button>
                            </form>
                        @else
                            <form action="{{ route('posts.like', $post) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Like</button>
                            </form>
                        @endif

                        @if ($post->user_id == auth()->id())
                            <a href="{{ route('posts.edit', $post) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Edit</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Delete</button>
                            </form>
                        @endif
                    @endauth

                    <div class="mt-4">
                        <strong>Liked by:</strong>
                        @if ($post->likes->isEmpty())
                            <p class="text-gray-600">No likes yet.</p>
                        @else
                            <ul class="list-disc list-inside text-gray-700">
                                @foreach ($post->likes as $like)
                                    <li>{{ $like->user ? $like->user->name : 'Unknown User' }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <p>No posts available.</p>
    @endif
@endsection
