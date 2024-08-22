@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-100 border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Dashboard</h2>
                <p class="mt-2 text-gray-600">Welcome, {{ auth()->user()->name }}! Here you can manage your posts and view recent activities.</p>
            </div>
        </div>

        <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-gray-100 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-800">Your Posts</h3>
                @if ($posts->isEmpty())
                    <p class="mt-2 text-gray-600">You haven't created any posts yet.</p>
                @else
                    <div class="mt-4">
                        @foreach ($posts as $post)
                            <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                                <h4 class="text-lg font-semibold">{{ $post->title }}</h4>
                                <p class="mt-2 text-gray-700">{{ $post->description }}</p>
                                <p class="mt-2 text-gray-500 text-sm">Created at: {{ $post->created_at->format('d M Y') }}</p>
                                <div class="mt-4 flex space-x-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
