@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        @include('post.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 p-6 bg-gray-900">
            <div class="w-full max-w-6xl p-6 mx-auto bg-gray-800 rounded-lg shadow-xl">
                <h2 class="mb-6 text-3xl font-semibold text-gray-100">Delete Posts</h2>

                <!-- Search Bar -->
                <form method="GET" action="{{ route('deletepostpage') }}" class="mb-6">
                    <div class="flex items-center">
                        <input type="text" name="search" id="search"
                            class="w-full p-3 text-white bg-gray-700 border border-gray-600 rounded-md focus:ring-2 focus:ring-purple-400 focus:outline-none"
                            placeholder="Search posts..." value="{{ request('search') }}">
                        <button type="submit"
                            class="p-3 ml-3 text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-400">
                            Search
                        </button>
                    </div>
                </form>

                <!-- Posts Table -->
                <table class="w-full text-left text-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-gray-600">Title</th>
                            <th class="px-4 py-2 border-b border-gray-600">Category</th>
                            <th class="px-4 py-2 border-b border-gray-600">Author</th>
                            <th class="px-4 py-2 border-b border-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-600">{{ $post->title }}</td>
                                <td class="px-4 py-2 border-b border-gray-600">{{ $post->category->name }}</td>
                                <td class="px-4 py-2 border-b border-gray-600">{{ $post->user->name }}</td>
                                <td class="px-4 py-2 border-b border-gray-600">
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-400 hover:underline">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 text-center text-gray-400">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
