@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1 class="text-4xl font-bold mb-6">Edit Post</h1>

    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT'){{-- this method allows you that can [ this is the method that i was taking about ] ---}}

        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" id="title" name="title" class="w-full border-gray-300 rounded-md shadow-sm p-2" value="{{ old('title', $post->title) }}" required>
            @error('title')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
            <textarea id="description" name="description" rows="4" class="w-full border-gray-300 rounded-md shadow-sm p-2" required>{{ old('description', $post->description) }}</textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="photo" class="block text-gray-700 font-semibold mb-2">Photo (optional)</label>
            @if ($post->photo)
                <img src="{{ Storage::url($post->photo) }}" alt="Post Photo" class="w-full h-64 object-cover mb-4">
            @endif
            <input type="file" id="photo" name="photo" class="w-full text-gray-700">
            @error('photo')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Post</button>
    </form>
@endsection
