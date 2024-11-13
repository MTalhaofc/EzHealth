@extends('firebase.layouts.main')
@section('content')

    <div class="container mx-auto px-6 py-8">
        <!-- Status messages -->
        @if (session('status'))
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-4 transition transform hover:scale-105 duration-300">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg shadow-md mb-4 transition transform hover:scale-105 duration-300">
                {{ session('error') }}
            </div>
        @endif

        <!-- Heading for the page -->
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6 ">User Appointments</h2>

        <!-- Appointments Section -->
        @if (!empty($matchedAppointments))
            <div class="space-y-4">
                @foreach ($matchedAppointments as $appointment)
                    <div class="bg-gradient-to-r from-red-100 to-blue-100 p-2 rounded-lg shadow-lg hover:shadow-2xl transition duration-300">
                        <div class="flex justify-between items-center mb-4">
                            <p class="font-medium text-lg">{{ $appointment['user_name_appointment'] }}</p>
                            <span class="font-semibold text-gray-600 text-sm">Appointment Date: {{ $appointment['user_date_appointment'] }}</span>
                            <p><span class="font-medium text-gray-700">Appointment Time:</span> {{ $appointment['user_time_appointment'] }}</p>

                        </div>
                        <p><span class="font-medium text-gray-700">Appointment Location:</span> {{ $appointment['user_address_appointment'] }}</p>
                        <p><span class="font-medium text-gray-700">Contact Number:</span> {{ $appointment['user_number_appointment'] }}</p>

                        <!-- Conditional display for Appointment Status -->
                        <p><span class="font-medium text-gray-700">Status:</span>
                            @if ($appointment['user_status_appointment'] === 'P')
                                <span class="text-yellow-600 font-semibold">Pending</span>
                            @elseif ($appointment['user_status_appointment'] === 'T')
                                <span class="text-green-600 font-semibold">Accepted</span>
                            @elseif ($appointment['user_status_appointment'] === 'F')
                                <span class="text-red-600 font-semibold">Rejected</span>
                            @else
                                <span class="text-gray-600 font-semibold">Unknown Status</span>
                            @endif
                        </p>

                        <p><span class="font-medium text-gray-700">Test:</span> {{ $appointment['user_test_appointment'] }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-yellow-100 p-6 rounded-lg shadow-md text-center">
                <p class="text-gray-600 text-lg font-semibold">No appointments found for this CNIC.</p>
            </div>
        @endif

        <!-- Button to add a new appointment -->
        <div class="mt-8 flex justify-center">
            <a href="{{ route('add_appointment', ['id' => $key]) }}"
                class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition transform hover:scale-105 duration-300">
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Appointment
                </span>
            </a>
        </div>
    </div>

@endsection
