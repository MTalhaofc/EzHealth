@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <!-- Page Title -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Generated Login Credentials</h1>

    <!-- Display the User Login Credentials -->
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">User Login Details</h2>

        <!-- Display CNIC as the user ID and the generated password -->
        <div class="mb-4">
            <p><strong>User ID (CNIC):</strong> {{ $userId }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
        </div>

        <!-- Optionally, you can add a button to download the credentials or print them -->
        <div class="mt-4">
            <button class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-4 py-2">
                Download Credentials
            </button>
        </div>
    </div>
</div>

@endsection
