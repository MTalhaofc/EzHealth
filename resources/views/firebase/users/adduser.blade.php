@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Add New User</h1>

    <!-- Display Status -->
    @if (session('status'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            <h4>{{ session('status') }}</h4>
        </div>
    @endif

    <!-- Add User Form -->
    <form action="{{ url('upload_user') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white shadow-md p-6 rounded-lg">
        @csrf

        <div class="mb-4">
            <label for="user_name" class="block text-sm font-medium text-gray-700">User Name</label>
            <input type="text" id="user_name" name="user_name" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="user_email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="user_email" name="user_email" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="user_cnic" class="block text-sm font-medium text-gray-700">CNIC</label>
            <input type="text" id="user_cnic" name="user_cnic" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="user_phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <input type="text" id="user_phone" name="user_phone" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="user_status" class="block text-sm font-medium text-gray-700">Status</label>
            <input type="text" id="user_account_status" name="user_account_status" value="P" readonly class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <div class="mb-4">
            <label for="user_cnic_image" class="block text-sm font-medium text-gray-700">CNIC Image</label>
            <input type="text" id="user_cnic_image_url" name="user_cnic_image_url" value="NA"  class="block w-full mt-1" required />
        </div>

        <div class="mb-4">
            <label for="user_password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="user_password" name="user_password" value="NA" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Add User
        </button>
    </form>
</div>

@endsection
