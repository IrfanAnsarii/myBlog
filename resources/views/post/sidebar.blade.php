<div class="w-1/4 p-6 text-white bg-gray-800 rounded-r-lg shadow-lg">
    <h2 class="mb-8 text-3xl font-semibold text-purple-400">Admin Dashboard</h2>
    <ul>
        @if (auth()->user()->role === 'admin')
            <li class="mb-4">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-purple-400 fas fa-folder"></i> Overview
                </a>
            </li>
        @endif

        @if (auth()->user()->role === 'author' || auth()->user()->role === 'admin')
            <li class="mb-4">
                <a href="{{ route('user.dashboard') }}"
                    class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-blue-400 fas fa-edit"></i> User Dashboard
                </a>
            </li>
        @endif

        @if (auth()->user()->role === 'author' || auth()->user()->role === 'admin')
            <li class="mb-4">
                <a href="{{ route('posts.create') }}"
                    class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-green-400 fas fa-plus-circle"></i> Create Post
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('editpostpage') }}"
                    class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-blue-400 fas fa-edit"></i> Edit Post
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('deletepostpage') }}"
                    class="flex items-center p-3 transition-all duration-300 transform rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-red-400 fas fa-trash"></i> Delete Post
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('poststatuspage') }}"
                    class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-red-400 fas fa-info-circle"></i> Post Status
                </a>
            </li>
        @endif

        @if (auth()->user()->role === 'admin')
            <li class="mb-4">
                <a href="{{ route('category.management') }}"
                    class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-red-400 fas fa-folder"></i> Category Management
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.comments') }}"
                    class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-purple-400 fas fa-comments"></i> Manage Comments
                </a>
            </li>
            <li class="mb-4">
                <a href="{{ route('admin.managerole') }}"
                    class="flex items-center p-3 rounded-lg hover:bg-indigo-700 hover:scale-105">
                    <i class="mr-3 text-purple-400 fas fa-users-cog"></i> User Role Management
                </a>
            </li>
        @endif
    </ul>
</div>
