@extends('firebase.layouts.app')
@section('content')

    <div class="container mx-auto px-4 py-8">
        @if (session('status'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="text-2xl font-bold text-gray-800 mb-4">User Appointments</h2>

        <h3 class="text-xl font-semibold text-gray-700 mb-6">Appointments for {{ $username }}: {{ $key }}</h3>


        @if (!empty($matchedAppointments))
        <h2>Matched Appointments:</h2>
        @foreach ($matchedAppointments as $appointment)
            <p>Patient Name: {{ $appointment['user_name_appointment'] }}</p>
            <p>Appointment Location: {{ $appointment['user_address_appointment'] }}</p>
            <p>Contact Number: {{ $appointment['user_number_appointment'] }}</p>
    
            <p>Appointment Date: {{ $appointment['user_date_appointment'] }}</p>
            <p>Appointment Time: {{ $appointment['user_time_appointment'] }}</p>
    
            <!-- Conditional display for Appointment Status -->
            <p>Status:
                @if ($appointment['user_status_appointment'] === 'p')
                    Pending
                @elseif ($appointment['user_status_appointment'] === 't')
                    Accepted
                @elseif ($appointment['user_status_appointment'] === 'r')
                    Rejected
                @else
                    Unknown Status
                @endif
            </p>
    
            <p>Test: {{ $appointment['user_test_appointment'] }}</p>
            <hr>
        @endforeach
    @else
        <p>No appointments found for this CNIC.</p>
    @endif
    

        {{-- Button to add a new appointment --}}
        <div class="mt-8">
            <a href="{{ route('add_appointment', ['id' => $key]) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Appointment
            </a>
        </div>
    </div>

@endsection
