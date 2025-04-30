@extends('layouts.app')

@section('content')
    <div class="flex min-h-screen bg-gray-900">
        <!-- Left Sidebar -->
        @include('post.sidebar')
        <!-- Main Content Area -->
        <div class="flex-1 p-6 bg-gray-900">
            <div class="w-full max-w-6xl p-6 mx-auto bg-gray-800 rounded-lg shadow-xl">
                <h2 class="mb-6 text-3xl font-semibold text-gray-100">Post Status Management</h2>
                @if (session('success'))
                    <div class="mb-4 text-green-400">{{ session('success') }}</div>
                @endif
                <table class="w-full text-left text-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-b border-gray-600">Title</th>
                            <th class="px-4 py-2 border-b border-gray-600">Likes</th>
                            <th class="px-4 py-2 border-b border-gray-600">Views</th>
                            <th class="px-4 py-2 border-b border-gray-600">Published</th>
                            <th class="px-4 py-2 border-b border-gray-600">Published Date</th>
                            <th class="px-4 py-2 border-b border-gray-600">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <form method="POST" action="{{ route('poststatus.update', $post->id) }}">
                                    @csrf
                                    <td class="px-4 py-2 border-b border-gray-600">{{ $post->title }}</td>
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <input type="number" name="likes" value="{{ $post->likes }}" min="0"
                                            class="w-16 p-1 text-white bg-gray-700 rounded">
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <input type="number" name="views" value="{{ $post->views }}" min="0"
                                            class="w-16 p-1 text-white bg-gray-700 rounded">
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <select name="is_published" class="text-white bg-gray-700 rounded">
                                            <option value="1" {{ $post->is_published ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ !$post->is_published ? 'selected' : '' }}>No</option>
                                        </select>
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <input type="datetime-local" name="published_at"
                                            value="{{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('Y-m-d\TH:i') : '' }}"
                                            class="text-white bg-gray-700 rounded">
                                    </td>
                                    <td class="px-4 py-2 border-b border-gray-600">
                                        <button type="submit"
                                            class="px-3 py-1 text-white bg-purple-600 rounded hover:bg-purple-700">Update</button>
                                    </td>
                                </form>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-2 text-center text-gray-400">No posts found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-6">
                    {{ $posts->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
