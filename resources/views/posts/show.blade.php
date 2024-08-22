@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-4">{{ $post->title }}</h1>
        <p class="text-gray-700 mb-4">{{ $post->body }}</p>

        <strong>Author:</strong> {{ $post->user->name }}

        <div class="mt-4">
            <strong>Liked by:</strong>
            @if ($post->likes->isEmpty())
                <p class="text-gray-600">No likes yet.</p>
            @else
                <ul class="list-disc list-inside text-gray-700">
                    @foreach ($post->likes as $like)
                        @if ($like->user)
                            <li>{{ $like->user->name }}</li>
                        @endif
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="mt-4">
            <form action="{{ route('posts.like', $post) }}" method="POST">
                @csrf
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">Like</button>
            </form>
            <form action="{{ route('posts.unlike', $post) }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded">Unlike</button>
            </form>
        </div>
    </div>
@endsection
