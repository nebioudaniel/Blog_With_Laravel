@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="bg-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-4xl font-bold mb-4">Welcome to Our Blog</h1>
                <p class="text-lg text-gray-600">Explore, create, and share your thoughts with our vibrant community.</p>
                <a href="{{ route('posts.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">View Posts</a>
            </div>

            <!-- About Section -->
            <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold mb-4">About Us</h2>
                <p class="text-gray-700">We are a passionate team dedicated to creating a platform where individuals can share their ideas and stories with the world. Our goal is to foster a supportive and engaging community for all.</p>
            </div>

            <!-- Additional Sections -->
            <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold mb-4">Our Mission</h2>
                <p class="text-gray-700">Our mission is to empower individuals by providing a space to express themselves freely and connect with like-minded people. We strive to build a platform that values creativity, diversity, and collaboration.</p>
            </div>

            <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold mb-4">Contact Us</h2>
                <p class="text-gray-700">Have questions or feedback? Feel free to reach out to us at <a href="mailto:support@example.com" class="text-blue-500 hover:underline">support@example.com</a>. We’d love to hear from you!</p>
            </div>
        </div>
    </div>
@endsection
