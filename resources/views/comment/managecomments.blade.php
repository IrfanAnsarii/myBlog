@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        <div class="w-1/4 p-6 text-white bg-gray-800 rounded-r-lg shadow-lg">
            <h2 class="mb-8 text-3xl font-semibold text-purple-400">Admin Dashboard</h2>
            <ul>
                <li class="mb-4">
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-yellow-400 fas fa-tachometer-alt"></i>
                        Overview
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('user.dashboard') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-blue-400 fas fa-edit"></i>
                        User Dashboard
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('posts.create') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-green-400 fas fa-plus-circle"></i>
                        Create Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('editpostpage') }}"
                        class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                        <i class="mr-3 text-blue-400 fas fa-edit"></i>
                        Edit Post
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
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
                        class="flex items-center p-3 scale-105 bg-indigo-700 rounded-lg">
                        <i class="mr-3 text-purple-400 fas fa-comments"></i> Manage Comments
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
            <h2 class="mb-6 text-2xl font-bold text-white">Manage Comments</h2>
            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded shadow">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b">ID</th>
                            <th class="px-4 py-2 border-b">Post</th>
                            <th class="px-4 py-2 border-b">User</th>
                            <th class="px-4 py-2 border-b">Content</th>
                            <th class="px-4 py-2 border-b">Status</th>
                            <th class="px-4 py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td class="px-4 py-2 border-b">{{ $comment->id }}</td>
                                <td class="px-4 py-2 border-b">{{ $comment->post->title ?? 'N/A' }}</td>
                                <td class="px-4 py-2 border-b">{{ $comment->user->name ?? 'N/A' }}</td>
                                <td class="px-4 py-2 border-b">{{ $comment->content }}</td>
                                <td class="px-4 py-2 border-b">
                                    @if ($comment->approved)
                                        <span class="text-green-600">Approved</span>
                                    @else
                                        <span class="text-yellow-600">Pending</span>
                                    @endif
                                </td>
                                <td class="flex px-4 py-2 space-x-2 border-b">
                                    <form action="{{ route('admin.comments.toggle', $comment->id) }}" method="POST">
                                        @csrf
                                        <button
                                            class="px-2 py-1 text-white {{ $comment->approved ? 'bg-yellow-500' : 'bg-green-500' }} rounded"
                                            type="submit">
                                            {{ $comment->approved ? 'Unapprove' : 'Approve' }}
                                        </button>
                                    </form>
                                    <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this comment?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-2 py-1 text-white bg-red-500 rounded"
                                            type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $comments->links() }}
            </div>
        </div>
    </div>
@endsection
