@extends('firebase.layouts.main')

@section('content')
<div class="container mx-auto mt-1 w-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Add New Admin</h1>

  
    <!-- Add Admin Form -->
    <form action="{{ url('add_admin') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Admin Role Field -->
        <div class="mb-4">
            <label for="admin_role" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-user-tag mr-2 text-indigo-500"></i> Role
            </label>
            <input type="text" id="admin_role" name="admin_role" required
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2"
                placeholder="Admin or Super Admin" />
        </div>

        <!-- Admin Email Field -->
        <div class="mb-4">
            <label for="admin_email" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-envelope mr-2 text-green-500"></i> Your Email
            </label>
            <input type="email" id="admin_email" name="admin_email" required
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2"
                placeholder="name@ezhealth.com" />
        </div>

        <!-- Admin Password Field -->
        <div class="mb-4">
            <label for="admin_password" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-lock mr-2 text-yellow-500"></i> Your Password
            </label>
            <input type="password" id="admin_password" name="admin_password" required
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2"
                placeholder="••••••••" />
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="w-full bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg text-sm px-4 py-2 text-center shadow-md transition duration-300">
            <i class="fas fa-user-plus mr-2"></i> Add New Admin
        </button>
    </form>
</div>
@endsection
