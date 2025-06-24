@extends('firebase.layouts.main')

@section('content')

<!-- Bold Heading for the Page Title -->
<h2 class="text-2xl font-bold mb-6">Home Test Appointments (All)</h2>


<!-- Buttons in Row, Same Size, Matching Color Theme -->
<div class="flex space-x-4 mb-6">
    <!-- Add Home Appointment Button -->
    <a href="{{ route('viewallusers_appointments') }}">
        <a href="{{ route('viewallusers_appointments') }}">
            <button class="flex items-center bg-red-600 text-white rounded-md hover:bg-red-700 px-3 py-1 text-sm font-semibold w-full sm:w-auto">
                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 4v16m8-8H4"></path>
                </svg>
                Add Home Appointment
            </button>
        </a>
        
        <!-- List of All Pending Appointments Button with New Icon -->
        <a href="{{ route('viewallappointments') }}">
            <button class="flex items-center bg-blue-600 text-white rounded-md hover:bg-blue-700 px-3 py-1 text-sm font-semibold w-full sm:w-auto">
                <!-- Changed Icon to a List Icon -->
                <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 3v18l15-9-15-9z"></path>
                </svg>
                List of All Pending Appointments
            </button>
        </a>
        
        
    </a>
</div>

@if(!empty($Appointments))
<div class="w-full overflow-hidden rounded-lg shadow-xs m-2 mr-2">
    <div class="w-full overflow-x-auto ">
        <table class="w-full whitespace-no-wrap border-solid border-2 ">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b bg-red-600">
                    <th class="px-4 py-3">Patient Name</th>
                    <th class="px-4 py-3">Appointment Location</th>
                    <th class="px-4 py-3">Contact Number</th>
                    <th class="px-4 py-3">Appointment Date</th>
                    <th class="px-4 py-3">Appointment Time</th>
                    <th class="px-4 py-3">Test</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y">
                @foreach ($Appointments as $appointment)
                    <tr class="text-gray-700">
                        <td class="px-4 py-3 text-sm">{{ $appointment['user_name_appointment'] }}</td>
                        <td class="px-4 py-3 text-sm">{{ $appointment['user_address_appointment'] }}</td>
                        <td class="px-4 py-3 text-sm">{{ $appointment['user_number_appointment'] }}</td>
                        <td class="px-4 py-3 text-sm">{{ $appointment['user_date_appointment'] }}</td>
                        <td class="px-4 py-3 text-sm">{{ $appointment['user_time_appointment'] }}</td>
                        <td class="px-4 py-3 text-sm">{{ $appointment['user_test_appointment'] }}</td>
                      
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@elseif(empty($Appointments))
    <p class="px-4 py-3 text-sm text-gray-600">No pending appointments found.</p>
@endif

@endsection
