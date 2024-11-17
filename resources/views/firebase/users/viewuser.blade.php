@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto mt-1 w-auto">
    <!-- Page Title -->
    <h3 class="text-xl font-semibold text-gray-800 mb-4">
        <i class="fas fa-user-circle mr-2 text-blue-500"></i> User Details
    </h3>
    <div class="mt-4 flex space-x-3">
        <!-- Back to All Users Button -->
        <a href="{{ route('viewallusers') }}" 
           class="flex-1 px-4 py-2 bg-blue-500 text-white text-sm font-medium rounded-md shadow hover:bg-blue-600">
            <i class="fas fa-arrow-left mr-2"></i> Back to All Users
        </a>
        <!-- Edit Button -->
        <a href="{{ route('edit_user', ['id' => $key]) }}" 
           class="flex-1 px-4 py-2 bg-red-500 text-white text-sm font-medium rounded-md shadow hover:bg-green-600">
            <i class="fas fa-edit mr-2"></i> Edit
        </a>
    </div>
    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4 text-sm shadow">
            {{ session('success') }}
        </div>
    @endif

    <!-- User Details Card -->
    <div class="bg-white border border-gray-300 rounded-md shadow-md p-4 mt-2">
        <!-- Name -->
        <div class="mb-3">
            <h4 class="text-sm font-medium text-gray-600">
                <i class="fas fa-user mr-2 text-blue-500"></i> Name:
            </h4>
            <p class="text-gray-900 text-sm">{{ $user['user_name'] ?? 'N/A' }}</p>
        </div>

        <!-- CNIC -->
        <div class="mb-3">
            <h4 class="text-sm font-medium text-gray-600">
                <i class="fas fa-id-card mr-2 text-yellow-500"></i> CNIC:
            </h4>
            <p class="text-gray-900 text-sm">{{ $user['user_cnic'] ?? 'N/A' }}</p>
        </div>

        <!-- Phone Number -->
        <div class="mb-3">
            <h4 class="text-sm font-medium text-gray-600">
                <i class="fas fa-phone mr-2 text-purple-500"></i> Phone Number:
            </h4>
            <p class="text-gray-900 text-sm">{{ $user['user_phone'] ?? 'N/A' }}</p>
        </div>

        <!-- Email -->
        <div class="mb-3">
            <h4 class="text-sm font-medium text-gray-600">
                <i class="fas fa-envelope mr-2 text-green-500"></i> Email:
            </h4>
            <p class="text-gray-900 text-sm">{{ $user['user_email'] ?? 'N/A' }}</p>
        </div>

        <!-- Account Status -->
        <div class="mb-3">
            <h4 class="text-sm font-medium text-gray-600">
                <i class="fas fa-info-circle mr-2 text-red-500"></i> Account Status:
            </h4>
            <p class="text-sm">
                @if ($user['user_account_status'] === 'P')
                    <span class="text-yellow-600 font-medium">Pending</span>
                @elseif ($user['user_account_status'] === 'T')
                    <span class="text-green-600 font-medium">Accepted</span>
                @elseif ($user['user_account_status'] === 'R')
                    <span class="text-red-600 font-medium">Rejected</span>
                @else
                    <span class="text-gray-500">Unknown</span>
                @endif
            </p>
        </div>

        <!-- CNIC Image -->
        <div class="mb-3">
            <h4 class="text-sm font-medium text-gray-600">
                <i class="fas fa-image mr-2 text-blue-400"></i> CNIC Image:
            </h4>
            @if ($user['user_cnic_img_url'] !== 'NA')
                <img src="{{ $user['user_cnic_img_url'] }}" alt="CNIC Image" 
                     class="w-40 h-40 object-cover rounded-md border border-gray-300 shadow-sm">
            @else
                <p class="text-gray-500 text-sm italic">No image available</p>
            @endif
        </div>
    </div>

    <!-- Action Buttons -->
    
</div>

@endsection
