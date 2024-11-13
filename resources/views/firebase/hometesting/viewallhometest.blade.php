@extends('firebase.layouts.main')

@section('content')

<h2 class="text-2xl font-semibold mb-6">Pending Home Test Appointments</h2>

<div class="flex gap-4 mb-6">
    <a href="{{ route('viewallusers_appointments') }}">
        <button class="flex items-center bg-red-600 text-white rounded-md hover:bg-red-700 px-3 py-1 text-sm font-semibold w-full sm:w-auto">
            <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 4v16m8-8H4"></path>
            </svg>
            Add Home Appointment
        </button>
    </a>
    
    <!-- All Appointments Button with a different icon -->
    <a href="{{ route('viewcompleteappointments') }}">
        <button class="flex items-center bg-blue-600 text-white rounded-md hover:bg-blue-700 px-3 py-1 text-sm font-semibold w-full sm:w-auto">
            <!-- Changed Icon: List Icon -->
            <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 3v18l15-9-15-9z"></path>
            </svg>
            All Appointments
        </button>
    </a>
</div>

@if (!empty($pendingAppointments))
    <form id="statusForm" method="POST" action="{{ route('update.appointment.status') }}">
        @csrf
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="w-full table-auto text-left border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-white text-xs font-semibold uppercase">
                        <th class="px-4 py-2">Patient Name</th>
                        <th class="px-4 py-2">Appointment Location</th>
                        <th class="px-4 py-2">Contact Number</th>
                        <th class="px-4 py-2">Appointment Date</th>
                        <th class="px-4 py-2">Appointment Time</th>
                        <th class="px-4 py-2">Test</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach ($pendingAppointments as $appointment)
                        <tr class="border-b hover:bg-gray-100" data-id="{{ $appointment['user_key_appointment'] }}">
                            <td class="px-4 py-2">{{ $appointment['user_name_appointment'] }}</td>
                            <td class="px-4 py-2">{{ $appointment['user_address_appointment'] }}</td>
                            <td class="px-4 py-2">{{ $appointment['user_number_appointment'] }}</td>
                            <td class="px-4 py-2">{{ $appointment['user_date_appointment'] }}</td>
                            <td class="px-4 py-2">{{ $appointment['user_time_appointment'] }}</td>
                            <td class="px-4 py-2">{{ $appointment['user_test_appointment'] }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 font-semibold rounded-full
                                    @if ($appointment['user_status_appointment'] == 'T') text-green-700 bg-green-100 
                                    @elseif ($appointment['user_status_appointment'] == 'R') text-red-700 bg-red-100 
                                    @else text-orange-700 bg-orange-100 
                                    @endif">
                                    {{ $appointment['user_status_appointment'] == 'T' ? 'Accepted' : 
                                       ($appointment['user_status_appointment'] == 'R' ? 'Rejected' : 'Pending') }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                <input type="radio" name="status[{{ $appointment['user_key_appointment'] }}]" value="T" class="mr-2"> Accept
                                <input type="radio" name="status[{{ $appointment['user_key_appointment'] }}]" value="F" class="mr-2"> Reject
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-between items-center">
            <!-- Update Status Button with Double Tick Icon -->
            <button type="submit" class="flex items-center bg-indigo-600 text-white rounded-md hover:bg-indigo-700 px-6 py-2 text-sm font-semibold">
                <!-- Double Tick Icon -->
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 11l3 3L22 4"></path>
                    <path d="M9 17l3 3L22 10"></path>
                </svg>
                Update Status
            </button>
        
            <!-- Accept All and Clear All Buttons with Icons and Smaller Size, Aligned in One Row -->
            <div class="flex gap-4">
                <button type="button" onclick="acceptAll()" class="flex items-center bg-green-600 text-white rounded-md hover:bg-green-700 px-4 py-1 text-xs font-semibold">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 12l5 5L20 7"></path>
                    </svg>
                    Accept All
                </button>
                <button type="button" onclick="clearAll()" class="flex items-center bg-red-600 text-white rounded-md hover:bg-red-700 px-4 py-1 text-xs font-semibold">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Clear All
                </button>
            </div>
        </div>
        
@else
    <!-- Display a table with a single row when no pending appointments -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full table-auto text-left border-collapse">
            <thead>
                <tr class="bg-gray-700 text-white text-xs font-semibold uppercase">
                    <th class="px-4 py-2">Message</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                <tr class="border-b hover:bg-gray-100">
                    <td class="px-4 py-2 text-center">No pending appointments found.</td>
                </tr>
            </tbody>
        </table>
    </div>
@endif

<script>
    // Function to select all Accept radio buttons for all appointments
    function acceptAll() {
        document.querySelectorAll('input[type="radio"][value="T"]').forEach(radio => {
            radio.checked = true;
        });
    }

    // Function to clear all radio button selections for all appointments
    function clearAll() {
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.checked = false;
        });
    }
</script>

@endsection
