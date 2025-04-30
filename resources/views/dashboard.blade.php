@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        <div class="w-1/4 p-6 text-white bg-gray-800 rounded-r-lg shadow-lg">
            <h2 class="mb-8 text-3xl font-semibold text-purple-400">Admin Dashboard</h2>
            <ul>

                <li class="mb-4">
                    <a href="{{ route('dashboard') }}" class="flex items-center p-3 scale-105 bg-indigo-700 rounded-lg">
                        <i class="mr-3 text-purple-400 fas fa-folder"></i> Overview
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

        <!-- Main Content Area -->
        <div class="flex-1 p-6 bg-gray-900">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                <!-- Total Posts Card -->
                <div
                    class="p-6 transition-all duration-300 transform bg-gray-800 rounded-lg shadow-xl hover:shadow-2xl hover:scale-105">
                    <h5 class="mb-2 text-xl font-semibold text-gray-100">
                        <i class="mr-3 text-purple-400 fas fa-file-alt"></i> Total Posts
                    </h5>
                    <p class="text-lg text-gray-400">{{ $totalPosts }}</p>
                </div>

                <!-- Total Users Card -->
                <div
                    class="p-6 transition-all duration-300 transform bg-gray-800 rounded-lg shadow-xl hover:shadow-2xl hover:scale-105">
                    <h5 class="mb-2 text-xl font-semibold text-gray-100">
                        <i class="mr-3 text-teal-400 fas fa-users"></i> Total Users
                    </h5>
                    <p class="text-lg text-gray-400">{{ $totalUsers }}</p>
                </div>

                <!-- Total Categories Card -->
                <div
                    class="p-6 transition-all duration-300 transform bg-gray-800 rounded-lg shadow-xl hover:shadow-2xl hover:scale-105">
                    <h5 class="mb-2 text-xl font-semibold text-gray-100">
                        <i class="mr-3 text-pink-400 fas fa-th-list"></i> Total Categories
                    </h5>
                    <p class="text-lg text-gray-400">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
