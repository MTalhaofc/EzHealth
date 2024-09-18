@extends('firebase.layouts.app')

@section('content')

<div class="container mx-auto mt-5">
    

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add New Test</h1>
    <form action="{{ route('upload_test' )}}" method="POST" >
      
        @csrf

    <div class="mb-3">
        <label for="test_name" class="block mb-1 text-sm font-medium text-gray-900">Test Name</label>
        <input type="text" id="test_name" name="test_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
            placeholder="Enter Test name" required />
    </div>

    <div class="mb-3">
        <label for="test_price" class="block mb-1 text-sm font-medium text-gray-900">Test Price (Rs.)</label>
        <input type="text" id="test_price" name="test_price"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
            placeholder="Enter Test Price" required />
    </div>

    
    <div class="mb-3">
        <label for="test_requirements" class="block mb-1 text-sm font-medium text-gray-900">Test Requirements</label>
        <input type="text" id="test_requirements" name="test_requirements"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
            placeholder="Enter Test Requirements (Fasting etc.)"  required />
    </div>
    <div class="mb-3">
        <label for="test_availabilty" class="block mb-1 text-sm font-medium text-gray-900">Test Avaialibilty</label>
        <input type="text" id="test_availabilty" name="test_availabilty"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
            placeholder="Enter Test Availibilty (Home Service etc.)"  required />
    </div>

    

    <!-- Submit Button -->
    <button type="submit"
        class="text-white bg-red-700 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center">
        Add New Test
    </button>
</form>
</div>

@endsection
