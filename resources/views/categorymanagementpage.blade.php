@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <div class="w-1/4 p-6 text-white bg-gray-800 rounded-r-lg shadow-lg">
            <h2 class="mb-8 text-3xl font-semibold text-purple-400">Admin Dashboard</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-yellow-400 fas fa-tachometer-alt"></i> Overview
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
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-green-400 fas fa-plus-circle"></i> Create Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('editpostpage') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-blue-400 fas fa-edit"></i> Edit Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('deletepostpage') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-red-400 fas fa-trash"></i> Delete Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('poststatuspage') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-red-400 fas fa-trash"></i> Post Status
                    </a>
                </li>

                <li class="mb-4">
                    <a href="{{ route('category.management') }}"
                        class="flex items-center p-3 scale-105 bg-indigo-700 rounded-lg">
                        <i class="mr-3 text-purple-400 fas fa-folder"></i> Category Management
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
        <div class="flex-1 p-6 bg-gray-900">
            <div class="w-full max-w-4xl p-6 mx-auto bg-gray-800 rounded-lg shadow-xl">
                <h2 class="mb-6 text-3xl font-semibold text-gray-100">Category Management</h2>
                @if (session('success'))
                    <div class="mb-4 text-green-400">{{ session('success') }}</div>
                @endif

                <!-- Add Category -->
                <form method="POST" action="{{ route('category.create') }}" class="flex gap-2 mb-6">
                    @csrf
                    <input type="text" name="name" placeholder="New Category Name" required
                        class="p-2 text-white bg-gray-700 rounded">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-purple-600 rounded hover:bg-purple-700">Add</button>
                </form>

                <!-- Category Table -->
                <table class="w-full text-left text-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-gray-600">Name</th>
                            <th class="px-4 py-2 border-b border-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <form method="POST" action="{{ route('category.update', $category->id) }}">
                                    @csrf
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <input type="text" name="name" value="{{ $category->name }}"
                                            class="p-1 text-white bg-gray-700 rounded">
                                    </td>
                                    <td class="flex gap-2 px-4 py-2 border-b border-gray-600">
                                        <button type="submit"
                                            class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700">Update</button>
                                </form>
                                <form method="POST" action="{{ route('category.delete', $category->id) }}"
                                    onsubmit="return confirm('Delete this category?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 text-white bg-red-600 rounded hover:bg-red-700">Delete</button>
                                </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="px-4 py-2 text-center text-gray-400">No categories found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
