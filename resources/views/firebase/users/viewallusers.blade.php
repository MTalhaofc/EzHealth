@extends('firebase.layouts.main')

@section('content')
   <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <!-- Title and Buttons in the Same Line -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">All Users</h1>
<!-- Add New User and Pending Users Buttons -->
<div class="flex space-x-4">
    <!-- Pending User Accounts Button -->
    <a href="{{ route('pending_users') }}">
        <button class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-1 px-2 rounded-lg shadow-lg transition transform hover:scale-105 duration-300">
            <i class="fas fa-user-clock mr-1"></i> Pending User Accounts
        </button>
    </a>

    <!-- Add New User Button -->
    <a href="{{ route('add_user') }}">
        <button class="bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white font-bold py-1 px-2 rounded-lg shadow-lg transition transform hover:scale-105 duration-300">
            <i class="fas fa-user-plus mr-1"></i> Add New User
        </button>
    </a>
</div>
    </div>

  

    <!-- Users Table -->
    @if (!empty($allusers))
        <div class="overflow-x-auto rounded-md">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-red-600 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left font-semibold">Name</th>
                        <th class="py-3 px-6 text-left font-semibold">CNIC</th>
                        <th class="py-3 px-6 text-left font-semibold">Number</th>
                        <th class="py-3 px-6 text-center font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    @forelse ($allusers as $key => $user)
                        @if (isset($status) && $user['user_account_status'] !== $status)
                            @continue
                        @endif
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                            <td class="py-3 px-6 text-left">{{ $user['user_name'] ?? 'N/A' }}</td>
                            <td class="py-3 px-6 text-left">{{ $user['user_cnic'] ?? 'N/A' }}</td>
                            <td class="py-3 px-6 text-left">{{ $user['user_phone'] ?? 'N/A' }}</td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('view_user', $key) }}" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded-md shadow-md transition duration-300 text-sm">
                                    View Details
                                    <!-- Right Arrow Icon -->
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 6l6 6-6 6"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-3 px-6 text-center text-gray-500">No users found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @else
        <!-- No Users Available Message -->
        <div class="text-center text-gray-600 mt-6">
            <p>No users available at the moment.</p>
        </div>
    @endif
</div>
@endsection
