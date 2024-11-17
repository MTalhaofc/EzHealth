@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Generated Login Credentials</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-user-circle mr-3 text-gray-600"></i> User Login Details
        </h2>

        <div class="mb-4">
            <p class="text-sm text-gray-600"><strong>User ID (CNIC):</strong> {{ $userId }}</p>
            <p class="text-sm text-gray-600"><strong>Password:</strong> {{ $password }}</p>
        </div>

        <div class="mt-4">
            <button class="flex items-center text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
                <i class="fas fa-download mr-2"></i> Download Credentials
            </button>
        </div>
    </div>
</div>

@endsection
