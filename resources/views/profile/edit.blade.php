@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')
    <h1 class="text-4xl font-bold mb-6">Edit Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
            <input type="text" id="name" name="name" class="w-full border-gray-300 rounded-md shadow-sm p-2" value="{{ old('name', auth()->user()->name) }}" required>
            @error('name')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input type="email" id="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm p-2" value="{{ old('email', auth()->user()->email) }}" required>
            @error('email')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Profile</button>
    </form>
@endsection
