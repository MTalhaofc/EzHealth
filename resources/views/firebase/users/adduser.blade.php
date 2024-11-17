@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto">
    @if (session('status'))
        <div class="alert alert-success text-center mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-lg w-full w-auto mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Add New User</h1>
        
        <form action="{{ url('upload_user') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- User Name -->
            <div class="mb-5">
                <label for="user_name" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-user mr-2 text-blue-500"></i> User Name
                </label>
                <input type="text" id="user_name" name="user_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter User Name" required />
            </div>

            <!-- Email -->
            <div class="mb-5">
                <label for="user_email" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-envelope mr-2 text-green-500"></i> Email
                </label>
                <input type="email" id="user_email" name="user_email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter Email" required />
            </div>

            <!-- CNIC -->
            <div class="mb-5">
                <label for="user_cnic" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-id-card mr-2 text-yellow-500"></i> CNIC
                </label>
                <input type="text" id="user_cnic" name="user_cnic"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter CNIC" required />
            </div>

            <!-- Phone Number -->
            <div class="mb-5">
                <label for="user_phone" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-phone mr-2 text-purple-500"></i> Phone Number
                </label>
                <input type="text" id="user_phone" name="user_phone"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter Phone Number" required />
            </div>

            <!-- Account Status -->
            <div class="mb-5">
                <label for="user_account_status" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-red-500"></i> Account Status
                </label>
                <input type="text" id="user_account_status" name="user_account_status" value="P" readonly
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" />
            </div>

            <!-- CNIC Image -->
            <div class="mb-5">
                <label for="user_cnic_img_url" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-image mr-2 text-indigo-500"></i> CNIC Image URL
                </label>
                <input type="text" id="user_cnic_img_url" name="user_cnic_img_url" value="NA"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter CNIC Image URL" required />
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="user_password" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-key mr-2 text-teal-500"></i> Password
                </label>
                <input type="password" id="user_password" name="user_password" value="NA"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter Password" required />
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 mt-4 text-center flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i> Add User
            </button>
        </form>
    </div>
</div>

@endsection
