@extends('firebase.layouts.app')
@section('content')

<h2>View Home Test Appointments (Pending)</h2>

<a href="{{ route('viewallusers_appointments') }}">
    <button class="bg-green-700 text-white rounded-md hover:text-black">Add Home Appointment</button>
</a>

<h2>List of All Pending Appointments</h2>

@if (!empty($pendingAppointments))
    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Appointment Location</th>
                <th>Contact Number</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Test</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingAppointments as $appointment)
                <tr>
                    <td>{{ $appointment['user_name_appointment'] }}</td>
                    <td>{{ $appointment['user_address_appointment'] }}</td>
                    <td>{{ $appointment['user_number_appointment'] }}</td>
                    <td>{{ $appointment['user_date_appointment'] }}</td>
                    <td>{{ $appointment['user_time_appointment'] }}</td>
                    <td>{{ $appointment['user_test_appointment'] }}</td>
                    <td>Pending</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No pending appointments found.</p>
@endif

@endsection
