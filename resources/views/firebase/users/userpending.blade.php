@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto mt-1 w-auto">
    <!-- Page Title -->
    <h3 class="text-3xl font-bold text-gray-800 mb-8">
        <i class="fas fa-user-circle mr-2 text-blue-500"></i> Pending User Details
    </h3>

    <!-- User Details Card -->
    <div class="bg-white border border-gray-200 rounded-lg shadow-lg p-6">
        <!-- User Name -->
        <div class="mb-2">
            <h4 class="text-lg font-semibold text-gray-600">
                <i class="fas fa-user mr-2 text-blue-500"></i> Name:
            </h4>
            <p class="text-gray-800 text-base">{{ $user['user_name'] ?? 'N/A' }}</p>
        </div>

        <!-- CNIC -->
        <div class="mb-2">
            <h4 class="text-lg font-semibold text-gray-600">
                <i class="fas fa-id-card mr-2 text-yellow-500"></i> CNIC:
            </h4>
            <p class="text-gray-800 text-base">{{ $user['user_cnic'] ?? 'N/A' }}</p>
        </div>

        <!-- Phone Number -->
        <div class="mb-2">
            <h4 class="text-lg font-semibold text-gray-600">
                <i class="fas fa-phone mr-2 text-purple-500"></i> Phone:
            </h4>
            <p class="text-gray-800 text-base">{{ $user['user_phone'] ?? 'N/A' }}</p>
        </div>

        <!-- Email -->
        <div class="mb-2">
            <h4 class="text-lg font-semibold text-gray-600">
                <i class="fas fa-envelope mr-2 text-green-500"></i> Email:
            </h4>
            <p class="text-gray-800 text-base">{{ $user['user_email'] ?? 'N/A' }}</p>
        </div>

        <!-- Account Status -->
        <div class="mb-2">
            <h4 class="text-lg font-semibold text-gray-600">
                <i class="fas fa-info-circle mr-2 text-red-500"></i> Account Status:
            </h4>
            <p class="text-gray-800 text-base">
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
        <div class="mb-2">
            <h4 class="text-lg font-semibold text-gray-600">
                <i class="fas fa-image mr-2 text-blue-400"></i> CNIC Image:
            </h4>
            @if ($user['user_cnic_img_url'] !== 'NA')
                <img src="{{ $user['user_cnic_img_url'] }}" alt="CNIC Image" class="w-120 h-40 object-cover rounded-lg border border-gray-300">
            @else
                <p class="text-gray-500 text-sm italic">No image available</p>
            @endif
        </div>

        <!-- Action Buttons -->
        <form method="POST" action="{{ route('update_user_status', $id) }}" class="mt-8">
            @csrf
            <div class="flex space-x-4">
                <!-- Accept Button -->
                <button type="submit" name="status" value="T" class="w-full px-4 py-2 bg-green-600 text-white font-medium text-sm rounded-lg shadow hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                    <i class="fas fa-check mr-2"></i> Accept
                </button>

                <!-- Reject Button -->
                <button type="submit" name="status" value="R" class="w-full px-4 py-2 bg-red-600 text-white font-medium text-sm rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-50">
                    <i class="fas fa-times mr-2"></i> Reject
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
