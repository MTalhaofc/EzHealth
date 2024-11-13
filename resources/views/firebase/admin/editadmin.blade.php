@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto mt-1">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Edit Admin</h2>

    <!-- Edit Admin Form -->
    <form class="w-auto mx-auto mt-8 bg-white p-6 rounded-lg shadow-md" action="{{ url('updateadmin/'.$key) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="admin_role" class="flex items-center text-sm font-medium text-gray-900 mb-2">
                <i class="fas fa-user-tag mr-2" style="color: #4A90E2;"></i> <!-- Blue for role -->
                Update Role
            </label>
            <input type="text" id="admin_role" name="admin_role"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2"
                value="{{ $editadmindata['admin_role'] }}" required />
        </div>

        <div class="mb-4">
            <label for="admin_email" class="flex items-center text-sm font-medium text-gray-900 mb-2">
                <i class="fas fa-envelope mr-2" style="color: #FF9900;"></i> <!-- Orange for email -->
                Update Email
            </label>
            <input type="email" id="admin_email" name="admin_email"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2"
                value="{{ $editadmindata['admin_email'] }}" required />
        </div>

        <div class="mb-4">
            <label for="admin_password" class="flex items-center text-sm font-medium text-gray-900 mb-2">
                <i class="fas fa-lock mr-2" style="color: #D0021B;"></i> <!-- Red for password -->
                Update Password
            </label>
            <input type="password" id="admin_password" name="admin_password"
                class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full p-2"
                placeholder="Enter Your New Password" required />
        </div>

        <button type="submit"
            class="w-full sm:w-auto px-4 py-2 bg-red-700 text-white rounded-lg hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-blue-300 font-medium text-sm flex items-center justify-center">
            <i class="fas fa-save mr-2" style="color: #FFFFFF;"></i> <!-- White for save button -->
            Update Admin
        </button>
    </form>
</div>

@endsection
