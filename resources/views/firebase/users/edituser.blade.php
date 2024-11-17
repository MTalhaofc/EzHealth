@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto mt-1 w-auto">
    <!-- Success Message -->
    @if (session('status'))
        <div class="alert alert-success text-center mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-lg w-full mx-auto">
        <div class="flex flex-row justify-between" >
        <h3 class="text-2xl font-bold mb-6 text-gray-800">Edit User Details</h3>

        <div class="">
            <a href="{{ route('viewallusers') }}" class="inline-block px-1 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-md shadow transition transform hover:scale-105 duration-300">
                <i class="fas fa-arrow-left mr-2"></i> Back to All Users
            </a>
        </div>
    </div>
        <form action="{{ route('update_user', ['id' => $key]) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-5">
                <label for="user_name" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-user mr-2 text-blue-500"></i> Name
                </label>
                <input type="text" id="user_name" name="user_name" value="{{ old('user_name', $user['user_name'] ?? '') }}" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" 
                    placeholder="Enter Name" required />
                @error('user_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone Number -->
            <div class="mb-5">
                <label for="user_phone" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-phone-alt mr-2 text-green-500"></i> Phone Number
                </label>
                <input type="text" id="user_phone" name="user_phone" value="{{ old('user_phone', $user['user_phone'] ?? '') }}" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" 
                    placeholder="Enter Phone Number" required />
                @error('user_phone')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-5">
                <label for="user_email" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-envelope mr-2 text-yellow-500"></i> Email
                </label>
                <input type="email" id="user_email" name="user_email" value="{{ old('user_email', $user['user_email'] ?? '') }}" 
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" 
                    placeholder="Enter Email" required />
                @error('user_email')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Account Status (Display only, non-editable) -->
            <div class="mb-5">
                <label for="user_account_status" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-info-circle mr-2 text-purple-500"></i> Account Status
                </label>
                <p class="mt-1 text-gray-900">
                    @if ($user['user_account_status'] === 'P')
                        <span class="text-yellow-600 font-semibold">Pending</span>
                    @elseif ($user['user_account_status'] === 'T')
                        <span class="text-green-600 font-semibold">Accepted</span>
                    @elseif ($user['user_account_status'] === 'R')
                        <span class="text-red-600 font-semibold">Rejected</span>
                    @else
                        <span class="text-gray-500">Unknown</span>
                    @endif
                </p>
            </div>

            <!-- Save Changes Button -->
            <div class="flex justify-end mt-6">
                <button type="submit" class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 mt-4 text-center flex items-center justify-center">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>

    <!-- Back to All Users Button -->
    
</div>

@endsection
