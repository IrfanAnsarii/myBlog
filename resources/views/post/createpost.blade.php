@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        @include('post.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 p-6 bg-gray-900">
            <div class="w-full max-w-4xl p-6 mx-auto bg-gray-800 rounded-lg shadow-xl">
                <h2 class="mb-6 text-3xl font-semibold text-gray-100">Add New Post</h2>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="title" class="text-lg font-medium text-gray-300">Post Title</label>
                        <input type="text" name="title" id="title"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post title" required>
                    </div>

                    <div class="mb-6">
                        <label for="description" class="text-lg font-medium text-gray-300">Post Description</label>
                        <input type="text" name="description" id="description"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post description" required>
                    </div>

                    <div class="mb-6">
                        <label for="content" class="text-lg font-medium text-gray-300">Post Content</label>
                        <textarea name="content" id="content" rows="6"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Write your post content here..." required></textarea>
                    </div>

                    <div class="mb-6">
                        <label for="keywords" class="text-lg font-medium text-gray-300">Keywords</label>
                        <input type="text" name="keywords" id="keywords"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post keywords (optional)">
                    </div>

                    <div class="mb-6">
                        <label for="slug" class="text-lg font-medium text-gray-300">Slug</label>
                        <input type="text" name="slug" id="slug"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter post slug" required>
                    </div>

                    <div class="mb-6">
                        <label for="image" class="text-lg font-medium text-gray-300">Upload Image</label>
                        <input type="file" name="image" id="image"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none">
                    </div>

                    <div class="mb-6">
                        <label for="image_link" class="text-lg font-medium text-gray-300">Image Link</label>
                        <input type="url" name="image_link" id="image_link"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Enter image URL (optional)">
                    </div>

                    <div class="mb-6">
                        <label for="category_id" class="text-lg font-medium text-gray-300">Category</label>
                        <select name="category_id" id="category_id"
                            class="w-full p-3 mt-2 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            required>
                            <option value="" disabled selected>Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="p-3 text-white transition-all duration-300 transform bg-purple-600 rounded-md hover:bg-purple-700 hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-400">
                            Add Post
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
