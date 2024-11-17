@extends('firebase.layouts.main')

@section('content')

<!-- Page Title -->
<h1 class="text-3xl font-bold text-gray-800 mb-6">All Users List</h1>

<!-- Display the Users List -->
<div class="overflow-x-auto bg-white shadow-md rounded-lg">
    @if($users && count($users) > 0)
        <table class="min-w-full bg-white border">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">User Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">User Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">User Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $userKey => $user)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $user['user_name'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $user['user_email'] }}</td>
                        <td class="px-6 py-4 text-sm text-gray-800">{{ $user['user_phone'] ?? 'NA' }}</td>
                        <td class="px-6 py-4 flex items-center gap-2">
                            <a href="{{ route('generateLogin', ['userKey' => $userKey]) }}">
                                <button class="flex items-center bg-red-600 text-white hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Generate ID and Pass
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-700">No users found.</p>
    @endif
</div>

@endsection
