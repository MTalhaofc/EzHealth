@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto mt-1 max-w-4xl">
    <!-- Page Title -->
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pending User Accounts</h2>
  <!-- Status Message -->
  @if (session('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 text-center" role="alert">
      <span class="block sm:inline">{{ session('success') }}</span>
  </div>
@endif

    <!-- Pending Users Table -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full border-collapse border border-gray-200">
            <thead class="bg-red-600">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wider">
                        <i class="fas fa-user mr-2 text-blue-500"></i> Name
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wider">
                        <i class="fas fa-id-card mr-2 text-yellow-500"></i> CNIC
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wider">
                        <i class="fas fa-phone mr-2 text-purple-500"></i> Number
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wider">
                        <i class="fas fa-info-circle mr-2 text-green-500"></i> Status
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-white uppercase tracking-wider">
                        <i class="fas fa-cogs mr-2 text-blue-500"></i> Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @forelse ($pendingsusers as $key => $user)
                    <tr class="border-t hover:bg-gray-50">
                        <!-- User Name -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $user['user_name'] ?? 'N/A' }}
                        </td>
                        <!-- CNIC -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $user['user_cnic'] ?? 'N/A' }}
                        </td>
                        <!-- Phone Number -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $user['user_phone'] ?? 'N/A' }}
                        </td>
                        <!-- Status -->
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if ($user['user_account_status'] === 'P')
                                <span class="text-yellow-600 font-medium">Pending</span>
                            @elseif ($user['user_account_status'] === 'T')
                                <span class="text-green-600 font-medium">Accepted</span>
                            @elseif ($user['user_account_status'] === 'R')
                                <span class="text-red-600 font-medium">Rejected</span>
                            @else
                                <span class="text-gray-500">Unknown</span>
                            @endif
                        </td>
                        <!-- Action -->
                        <td class="px-6 py-4">
                            <a href="{{ route('pending_user', $key) }}" 
                               class="inline-flex items-center px-3 py-2 text-xs font-medium text-white bg-blue-500 hover:bg-blue-600 rounded-lg shadow">
                                <i class="fas fa-eye mr-1"></i> View Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            <i class="fas fa-info-circle mr-2 text-gray-400"></i> No pending users found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
