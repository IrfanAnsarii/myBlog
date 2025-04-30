@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        @include('post.sidebar')

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
