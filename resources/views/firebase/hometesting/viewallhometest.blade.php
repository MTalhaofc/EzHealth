@extends('firebase.layouts.app')
@section('content')

<h2>View All Home Test Appointments</h2>

<a href="{{ route('viewallusers_appointments') }}">
    <button class="bg-green-700 text-white rounded-md hover:text-black">Add Home Appointment</button>
</a>

<h2>Accepted Appointments</h2>
@if (!empty($acceptedAppointments))
    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Appointment Location</th>
                <th>Contact Number</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Test</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($acceptedAppointments as $appointment)
                <tr>
                    <td>{{ $appointment['user_name_appointment'] }}</td>
                    <td>{{ $appointment['user_address_appointment'] }}</td>
                    <td>{{ $appointment['user_number_appointment'] }}</td>
                    <td>{{ $appointment['user_date_appointment'] }}</td>
                    <td>{{ $appointment['user_time_appointment'] }}</td>
                    <td>{{ $appointment['user_test_appointment'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No accepted appointments found.</p>
@endif

<h2>Rejected Appointments</h2>
@if (!empty($rejectedAppointments))
    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Appointment Location</th>
                <th>Contact Number</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Test</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rejectedAppointments as $appointment)
                <tr>
                    <td>{{ $appointment['user_name_appointment'] }}</td>
                    <td>{{ $appointment['user_address_appointment'] }}</td>
                    <td>{{ $appointment['user_number_appointment'] }}</td>
                    <td>{{ $appointment['user_date_appointment'] }}</td>
                    <td>{{ $appointment['user_time_appointment'] }}</td>
                    <td>{{ $appointment['user_test_appointment'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No rejected appointments found.</p>
@endif

@endsection
