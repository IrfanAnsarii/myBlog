@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        <div class="w-1/4 p-6 text-white bg-gray-800 rounded-r-lg shadow-lg">
            <h2 class="mb-8 text-3xl font-semibold text-purple-400">Admin Dashboard</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-yellow-400 fas fa-tachometer-alt"></i>
                        Overview
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('posts.create') }}"
                        class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-green-400 fas fa-plus-circle"></i>
                        Create Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('editpostpage') }}"
                        class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-blue-400 fas fa-edit"></i>
                        Edit Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#"
                        class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-red-400 fas fa-trash"></i>
                        Delete Post
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6 bg-gray-900">
            <div class="w-full max-w-4xl p-6 mx-auto bg-gray-800 rounded-lg shadow-xl">
                <h2 class="mb-6 text-3xl font-semibold text-gray-100">Edit Post</h2>
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-6">
                        <label for="title" class="text-lg font-medium text-gray-300">Post Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post title" value="{{ $post->title }}" required>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="text-lg font-medium text-gray-300">Post Description</label>
                        <input type="text" name="description" id="description"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post description" value="{{ $post->description }}" required>
                    </div>

                    <div class="mb-6">
                        <label for="content" class="text-lg font-medium text-gray-300">Post Content</label>
                        <textarea name="content" id="content" rows="6"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Write your post content here..." required>{{ $post->content }}</textarea>
                    </div>

                    <div class="mb-6">
                        <label for="keywords" class="text-lg font-medium text-gray-300">Keywords</label>
                        <input type="text" name="keywords" id="keywords"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post keywords (optional)" value="{{ $post->keywords }}">
                    </div>

                    <div class="mb-6">
                        <label for="slug" class="text-lg font-medium text-gray-300">Slug</label>
                        <input type="text" name="slug" id="slug"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post slug" value="{{ $post->slug }}" required>
                    </div>

                    <div class="mb-6">
                        <label for="image" class="text-lg font-medium text-gray-300">Upload Image</label>
                        <input type="file" name="image" id="image"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none">
                        @if ($post->image && !filter_var($post->image, FILTER_VALIDATE_URL))
                            <p class="mt-2 text-sm text-gray-400">Current Image: <a href="{{ asset($post->image) }}"
                                    target="_blank" class="text-purple-400 hover:underline">View</a></p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label for="image_link" class="text-lg font-medium text-gray-300">Image Link</label>
                        <input type="url" name="image_link" id="image_link"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter image URL (optional)"
                            value="{{ filter_var($post->image, FILTER_VALIDATE_URL) ? $post->image : '' }}">
                    </div>

                    <div class="mb-6">
                        <label for="category_id" class="text-lg font-medium text-gray-300">Category</label>
                        <select name="category_id" id="category_id"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            required>
                            <option value="" disabled>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($post->category_id == $category->id) selected @endif>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="p-3 text-white transition-all duration-300 transform bg-purple-600 rounded-md hover:bg-purple-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-400">
                            Update Post
                        </button>
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-400 hover:text-gray-100">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // JavaScript to ensure only one input is used (either file upload or image link)
        const imageInput = document.getElementById('image');
        const imageLinkInput = document.getElementById('image_link');

        imageInput.addEventListener('change', function() {
            if (this.value) {
                imageLinkInput.value = ''; // Clear the image link input
                imageLinkInput.disabled = true; // Disable the image link input
            } else {
                imageLinkInput.disabled = false; // Enable the image link input
            }
        });

        imageLinkInput.addEventListener('input', function() {
            if (this.value) {
                imageInput.value = ''; // Clear the file input
                imageInput.disabled = true; // Disable the file input
            } else {
                imageInput.disabled = false; // Enable the file input
            }
        });
    </script>
@endsection
