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
                        <i class="mr-3 text-blue-400 fas fa-edit"></i>
                        Overview
                    </a>
                </li>

                <li class="mb-4">
                    <a href="{{ route('user.dashboard') }}" class="flex items-center p-3 scale-105 bg-indigo-700 rounded-lg">
                        <i class="mr-3 text-purple-400 fas fa-folder"></i> User Dashboard
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
        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gray-900">
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3">
                <div class="p-6 bg-gray-800 rounded-lg shadow-xl">
                    <h5 class="mb-2 text-xl font-semibold text-gray-100">
                        <i class="mr-3 text-purple-400 fas fa-file-alt"></i> Your Posts
                    </h5>
                    <p class="text-lg text-gray-400">{{ $totalPosts }}</p>
                </div>
                <div class="p-6 bg-gray-800 rounded-lg shadow-xl">
                    <h5 class="mb-2 text-xl font-semibold text-gray-100">
                        <i class="mr-3 text-teal-400 fas fa-users"></i> Total Users
                    </h5>
                    <p class="text-lg text-gray-400">{{ $totalUsers }}</p>
                </div>
                <div class="p-6 bg-gray-800 rounded-lg shadow-xl">
                    <h5 class="mb-2 text-xl font-semibold text-gray-100">
                        <i class="mr-3 text-pink-400 fas fa-th-list"></i> Total Categories
                    </h5>
                    <p class="text-lg text-gray-400">{{ $totalCategories }}</p>
                </div>
            </div>
            <h2 class="mb-4 text-xl font-bold text-gray-100">Your Posts</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full text-gray-200 bg-gray-800 rounded shadow">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Category</th>
                            <th class="px-4 py-2">Published</th>
                            <th class="px-4 py-2">Views</th>
                            <th class="px-4 py-2">Likes</th>
                            <th class="px-4 py-2">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($posts as $post)
                            <tr>
                                <td class="px-4 py-2 border">{{ $post->title }}</td>
                                <td class="px-4 py-2 border">{{ $post->category->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">
                                    @if ($post->is_published)
                                        <span class="text-green-500">Yes</span>
                                    @else
                                        <span class="text-red-500">No</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 border">{{ $post->views }}</td>
                                <td class="px-4 py-2 border">{{ $post->likes }}</td>
                                <td class="px-4 py-2 border">{{ $post->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-500">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $posts->links('pagination::tailwind') }}
            </div>
        </div>
    </div>
@endsection
