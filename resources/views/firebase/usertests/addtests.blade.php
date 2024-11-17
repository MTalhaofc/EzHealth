@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto ">
    
    @if (session('status'))
        <div class="alert alert-success text-center mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-lg w-full w-auto mx-auto">
        <h1 class="text-2xl font-bold mb-6  text-gray-800">Add New Test</h1>
        
        <form action="{{ route('upload_test' )}}" method="POST">
            @csrf

            <!-- Test Name -->
            <div class="mb-5">
                <label for="test_name" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-vial mr-2 text-blue-500"></i> Test Name
                </label>
                <input type="text" id="test_name" name="test_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter Test Name" required />
            </div>

            <!-- Test Price -->
            <div class="mb-5">
                <label for="test_price" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-tag mr-2 text-green-500"></i> Test Price (Rs.)
                </label>
                <input type="text" id="test_price" name="test_price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter Test Price" required />
            </div>

            <!-- Test Requirements -->
            <div class="mb-5">
                <label for="test_requirements" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-tasks mr-2 text-yellow-500"></i> Test Requirements
                </label>
                <input type="text" id="test_requirements" name="test_requirements"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter Requirements (e.g., Fasting)" required />
            </div>
          
            <!-- Test Availability -->
            <div class="mb-5">
                <label for="test_availabilty" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                    <i class="fas fa-calendar-check mr-2 text-purple-500"></i> Test Availability
                </label>
                <input type="text" id="test_availabilty" name="test_availabilty"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter Availability (e.g., Home Service)" required />
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 mt-4 text-center flex items-center justify-center">
                <i class="fas fa-plus mr-2"></i> Add New Test
            </button>
        </form>
    </div>
</div>

@endsection
