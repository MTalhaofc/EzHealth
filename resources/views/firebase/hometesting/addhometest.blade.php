@extends('firebase.layouts.main')

@section('content')

    <div class="container">
        <h2 class="text-2xl font-semibold text-black mb-4 ">Add Home Test(Appointment)</h2>

        <!-- Full-width Form Container with slight padding -->
        <div class="bg-white p-6 rounded-lg shadow-md w-auto mx-auto">
            <form action="{{ route('upload_hometest', ['id' => $key]) }}" method="POST">
                @csrf

                <!-- Define a fixed width for labels for consistent alignment -->
                <style>
                    .form-label {
                        width: 120px;
                    }
                </style>

                <!-- User Name -->
                <div class="flex items-center mb-3">
                    <i class="fas fa-user text-red-600 mr-2"></i>
                    <label for="user_name_appointment" class="form-label text-gray-700 font-medium">User Name</label>
                    <input type="text" id="user_name_appointment" name="user_name_appointment" value="{{$username}}" 
                        class="p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <!-- User Phone Number -->
                <div class="flex items-center mb-3">
                    <i class="fas fa-phone text-red-600 mr-2"></i>
                    <label for="user_number_appointment" class="form-label text-gray-700 font-medium">Phone Number</label>
                    <input type="text" id="user_number_appointment" name="user_number_appointment" value="{{$usernumber}}" 
                        class="p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <!-- User Address -->
                <div class="flex items-center mb-3">
                    <i class="fas fa-map-marker-alt text-red-600 mr-2"></i>
                    <label for="user_address_appointment" class="form-label text-gray-700 font-medium">Address</label>
                    <input type="text" id="user_address_appointment" name="user_address_appointment" 
                        class="p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <!-- User CNIC -->
                <div class="flex items-center mb-3">
                    <i class="fas fa-id-card text-red-500 mr-2"></i>
                    <label for="user_cnic_appointment" class="form-label text-gray-700 font-medium">CNIC</label>
                    <input type="text" id="user_cnic_appointment" name="user_cnic_appointment" value="{{$usercnic}}" 
                        class="p-2 w-full border border-gray-300 rounded-md" required readonly>
                </div>

                <!-- Appointment Date -->
                <div class="flex items-center mb-3">
                    <i class="fas fa-calendar-alt text-red-600 mr-2"></i>
                    <label for="user_date_appointment" class="form-label text-gray-700 font-medium">Date</label>
                    <input type="date" id="user_date_appointment" name="user_date_appointment" 
                        class="p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <!-- Appointment Status -->
                <div class="flex items-center mb-3">
                    <i class="fas fa-info-circle text-red-600 mr-2"></i>
                    <label for="user_status_appointment" class="form-label text-gray-700 font-medium">Status</label>
                    <input type="text" id="user_status_appointment" name="user_status_appointment" value="P" 
                        class="p-2 w-full border border-gray-300 rounded-md" required readonly>
                </div>

                <!-- Test -->
                <div class="flex items-center mb-3">
                    <i class="fas fa-vials text-red-600 mr-2"></i>
                    <label for="user_test_appointment" class="form-label text-gray-700 font-medium">Test</label>
                    <input type="text" id="user_test_appointment" name="user_test_appointment" 
                        class="p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <!-- Appointment Time -->
                <div class="flex items-center mb-4">
                    <i class="fas fa-clock text-red-600 mr-2"></i>
                    <label for="user_time_appointment" class="form-label text-gray-700 font-medium">Time</label>
                    <input type="time" id="user_time_appointment" name="user_time_appointment" 
                        class="p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md shadow-md transition duration-300 ease-in-out text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4v16m8-8H4"></path>
                        </svg>
                        Add Appointment
                    </button>
                </div>
                
            </form>
        </div>
    </div>

@endsection 
