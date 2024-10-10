@extends('firebase.layouts.app')

@section('content')
    <h2>Add Home Test of Relevant User</h2>

    <form  action="{{ route('upload_hometest', ['id' => $key]) }}" method="POST">
        @csrf
        <div>
            <label for="user_name_appointment">User Name</label>
            <input type="text" id="user_name_appointment" name="user_name_appointment" value="{{$username}}"  required>
        </div>

        <div>
            <label for="user_number_appointment">User Phone Number</label>
            <input type="text" id="user_number_appointment" name="user_number_appointment" value="{{$usernumber}}" required>
        </div>

        <div>
            <label for="user_address_appointment">User Address</label>
            <input type="text" id="user_address_appointment" name="user_address_appointment"  required>
        </div>

        <div>
            <label for="user_cnic_appointment">User CNIC</label>
            <input type="text" id="user_cnic_appointment" name="user_cnic_appointment" value="{{$usercnic}}" required>
        </div>

        <div>
            <label for="user_date_appointment">Appointment Date</label>
            <input type="date" id="user_date_appointment" name="user_date_appointment" required>
        </div>

        <div>
            <label for="user_status_appointment">Appointment Status</label>
            <input type="text" id="user_status_appointment" name="user_status_appointment" value ="p" required>
        </div>

        <div>
            <label for="user_test_appointment">Test</label>
            <input type="text" id="user_test_appointment" name="user_test_appointment" required>
        </div>

        <div>
            <label for="user_time_appointment">Appointment Time</label>
            <input type="time" id="user_time_appointment" name="user_time_appointment" required>
        </div>

        <button type="submit">Add Appointment</button>
    </form>
@endsection
