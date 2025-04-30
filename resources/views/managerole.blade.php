@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        @include('post.sidebar')

        <!-- Main Content Area -->
        <div class="flex-1 p-6 bg-gradient-to-br from-gray-900 to-gray-800">
            <div class="w-full max-w-5xl p-8 mx-auto bg-gray-800 border border-gray-700 shadow-2xl rounded-xl">
                <h2 class="mb-8 text-3xl font-bold tracking-wide text-purple-300">User Role Management</h2>
                @if (session('success'))
                    <div class="px-4 py-2 mb-6 text-green-100 bg-green-700 rounded shadow">{{ session('success') }}</div>
                @endif
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-gray-200 bg-gray-900 rounded-lg shadow">
                        <thead>
                            <tr class="text-purple-200 bg-gray-700">
                                <th class="px-6 py-3 border-b border-gray-700">Name</th>
                                <th class="px-6 py-3 border-b border-gray-700">Email</th>
                                <th class="px-6 py-3 border-b border-gray-700">Role</th>
                                <th class="px-6 py-3 border-b border-gray-700">Change Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="transition hover:bg-gray-800">
                                    <td class="px-6 py-3 border-b border-gray-700">{{ $user->name }}</td>
                                    <td class="px-6 py-3 border-b border-gray-700">{{ $user->email }}</td>
                                    <td class="px-6 py-3 border-b border-gray-700">
                                        <span
                                            class="inline-block px-2 py-1 rounded
                                            @if ($user->role == 'admin') bg-purple-700 text-purple-100
                                            @elseif($user->role == 'author') bg-blue-700 text-blue-100
                                            @else bg-gray-700 text-gray-200 @endif">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3 border-b border-gray-700">
                                        <form action="{{ route('admin.user.role', $user->id) }}" method="POST"
                                            class="flex items-center gap-2">
                                            @csrf
                                            <select name="role"
                                                class="p-2 text-white bg-gray-700 border border-gray-600 rounded focus:ring-2 focus:ring-purple-400">
                                                <option value="user" @if ($user->role == 'user') selected @endif>
                                                    User</option>
                                                <option value="author" @if ($user->role == 'author') selected @endif>
                                                    Author</option>
                                                <option value="admin" @if ($user->role == 'admin') selected @endif>
                                                    Admin</option>
                                            </select>
                                            <button type="submit"
                                                class="px-4 py-2 text-white transition bg-purple-600 rounded hover:bg-purple-700">
                                                Update
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-400">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center mt-6">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
