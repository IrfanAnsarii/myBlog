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
                    <a href="{{ route('user.dashboard') }}"
                        class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-blue-400 fas fa-edit"></i>
                        User Dashboard
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
                    <a href="{{ route('editpostpage') }}" class="flex items-center p-3 scale-105 bg-indigo-700 rounded-lg">
                        <i class="mr-3 text-purple-400 fas fa-folder"></i> Edit Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('deletepostpage') }}"
                        class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-red-400 fas fa-trash"></i>
                        Delete Post
                    </a>
                </li>

                <li class="mb-4">
                    <a href="{{ route('poststatuspage') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-red-400 fas fa-info-circle"></i> Post Status
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('category.management') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-red-400 fas fa-folder"></i> Category Management
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.comments') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-purple-400 fas fa-comments"></i>
                        Manage Comments
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('admin.managerole') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-purple-400 fas fa-users-cog"></i>
                        User Role Management
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 p-6 bg-gray-900">
            <div class="w-full max-w-6xl p-6 mx-auto bg-gray-800 rounded-lg shadow-xl">
                <h2 class="mb-6 text-3xl font-semibold text-gray-100">All Posts</h2>

                <!-- Search Bar -->
                <form method="GET" action="{{ route('editpostpage') }}" class="mb-6">
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
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="text-blue-400 hover:underline">Edit</a>
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
