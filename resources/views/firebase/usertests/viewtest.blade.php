@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">View Test</h1>

    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 text-center" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="test-details mb-6 p-6 bg-gray-50 rounded-lg shadow-sm">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 flex items-center">
            <i class="fas fa-info-circle mr-2 text-blue-500"></i> Test Details
        </h2>

        <div class="space-y-4">
            <!-- Test Name -->
            <p class="flex items-center text-gray-700 text-sm">
                <i class="fas fa-vial mr-3 text-indigo-500"></i>
                <span class="font-semibold">Test Name:</span>
                <span class="ml-2">{{ $vieweachtest['test_name'] }}</span>
            </p>

            <!-- Test Price -->
            <p class="flex items-center text-gray-700 text-sm">
                <i class="fas fa-tag mr-3 text-green-500"></i>
                <span class="font-semibold">Test Price:</span>
                <span class="ml-2">Rs. {{ $vieweachtest['test_price'] }}</span>
            </p>

            <!-- Test Requirements -->
            <p class="flex items-center text-gray-700 text-sm">
                <i class="fas fa-tasks mr-3 text-yellow-500"></i>
                <span class="font-semibold">Requirements:</span>
                <span class="ml-2">{{ $vieweachtest['test_requirements'] }}</span>
            </p>

            <!-- Test Availability -->
            <p class="flex items-center text-gray-700 text-sm">
                <i class="fas fa-calendar-check mr-3 text-purple-500"></i>
                <span class="font-semibold">Availability:</span>
                <span class="ml-2">{{ $vieweachtest['test_availabilty'] }}</span>
            </p>
        </div>
    </div>

    <div class="actions mb-6 flex space-x-4">
        <!-- Edit Button with Font Awesome Pencil Icon -->
        <a href="{{ route('edit_test', ['id' => $key]) }}" class="inline-flex items-center bg-blue-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-blue-700 transition duration-300">
            <i class="fas fa-pencil-alt mr-2"></i> Edit
        </a>

        <!-- Delete Button with Font Awesome Trash Icon -->
        <button type="button" id="deleteButton" class="inline-flex items-center bg-red-600 text-white py-2 px-4 rounded-lg shadow-md hover:bg-red-700 transition duration-300">
            <i class="fas fa-trash-alt mr-2"></i> Delete
        </button>
    </div>

    <!-- Custom Modal for Deletion Confirmation -->
    <div id="confirmationModal" class="modal hidden fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg p-6 text-center max-w-sm">
            <h2 class="text-lg font-semibold mb-4">Confirm Deletion</h2>
            <p>Are you sure you want to delete this test?</p>
            
            <!-- Form to delete the test - inside the modal -->
            <form id="deleteForm" action="{{ route('delete_test', ['id' => $key]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')

                <div class="mt-6 flex justify-around">
                    <!-- Cancel Button with Font Awesome Times Icon -->
                    <button type="button" id="cancelButton" class="inline-flex items-center bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 transition duration-300">
                        <i class="fas fa-times mr-2"></i> Cancel
                    </button>

                    <!-- Confirm Delete Button with Font Awesome Trash Icon -->
                    <button type="submit" id="confirmDeleteButton" class="inline-flex items-center bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300">
                        <i class="fas fa-trash-alt mr-2"></i> Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Inline Style for Modal Visibility -->
    <style>
        .modal {
            display: none; /* Initially hidden */
        }

        .modal.show {
            display: flex; /* Show the modal when 'show' class is added */
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get the delete button and modal elements
            const deleteButton = document.getElementById('deleteButton');
            const confirmationModal = document.getElementById('confirmationModal');
            const cancelButton = document.getElementById('cancelButton');
            const confirmDeleteButton = document.getElementById('confirmDeleteButton');
            const deleteForm = document.getElementById('deleteForm');

            // Show the modal when the delete button is clicked
            deleteButton.addEventListener('click', function () {
                confirmationModal.classList.add('show'); // Add 'show' class to make modal visible
            });

            // Hide the modal when the cancel button is clicked
            cancelButton.addEventListener('click', function () {
                confirmationModal.classList.remove('show'); // Remove 'show' class to hide modal
            });
        });
    </script>
</div>

@endsection
