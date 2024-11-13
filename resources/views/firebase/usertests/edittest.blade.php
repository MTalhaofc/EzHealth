@extends('firebase.layouts.main')

@section('content')
<div class="container mx-auto w-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Test</h2>

    <form method="POST" action="{{ route('update_test', $id) }}">
        @csrf

        <!-- Test Name -->
        <div class="mb-4 ">
            <label for="test_name" class="block text-sm font-medium text-gray-700 flex items-center mb-1">
                <i class="fas fa-vial mr-2 text-indigo-500"></i> Test Name
            </label>
            <input type="text" id="test_name" name="test_name" value="{{ $testData['test_name'] }}" required
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
        </div>

        <!-- Test Price -->
        <div class="mb-4">
            <label for="test_price" class="block text-sm font-medium text-gray-700 flex items-center mb-1">
                <i class="fas fa-tag mr-2 text-green-500"></i> Test Price (Rs.)
            </label>
            <input type="number" id="test_price" name="test_price" value="{{ $testData['test_price'] }}" required
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
        </div>

        <!-- Test Requirements -->
        <div class="mb-4">
            <label for="test_requirements" class="block text-sm font-medium text-gray-700 flex items-center mb-1">
                <i class="fas fa-tasks mr-2 text-yellow-500"></i> Test Requirements
            </label>
            <input type="text" id="test_requirements" name="test_requirements" value="{{ $testData['test_requirements'] }}" required
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
        </div>

        <!-- Test Availability -->
        <div class="mb-4">
            <label for="test_availabilty" class="block text-sm font-medium text-gray-700 flex items-center mb-1">
                <i class="fas fa-calendar-check mr-2 text-purple-500"></i> Test Availability
            </label>
            <input type="text" id="test_availabilty" name="test_availabilty" value="{{ $testData['test_availabilty'] }}" required
                class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2">
        </div>

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-300">
                <i class="fas fa-save mr-2"></i> Update Test
            </button>
        </div>
    </form>
</div>
@endsection
