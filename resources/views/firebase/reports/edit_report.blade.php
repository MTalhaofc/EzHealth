@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Report</h1>

    @if(session('status'))
        <div class="alert alert-success text-center mb-6 p-4 bg-green-100 text-green-800 rounded-lg shadow-sm">
            {{ session('status') }}
        </div>
    @endif

    <div class="bg-white p-8 rounded-lg shadow-lg w-full w-auto mx-auto">
        <form action="{{ route('update_report', ['reportKey' => $reportKey]) }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Patient Name -->
                <div class="mb-5">
                    <label for="user_report_patient_name" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-user mr-2 text-blue-500"></i> Patient Name
                    </label>
                    <input type="text" id="user_report_patient_name" name="user_report_patient_name" value="{{ $reportData['user_report_patient_name'] }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                </div>

                <!-- Parent CNIC -->
                <div class="mb-5">
                    <label for="user_report_parent_cnic" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-id-card mr-2 text-green-500"></i> Parent CNIC
                    </label>
                    <input type="text" id="user_report_parent_cnic" name="user_report_parent_cnic" value="{{ $reportData['user_report_parent_cnic'] }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                </div>

                <!-- Patient CNIC -->
                <div class="mb-5">
                    <label for="user_report_cnic" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-id-card mr-2 text-green-500"></i> Patient CNIC
                    </label>
                    <input type="text" id="user_report_cnic" name="user_report_cnic" value="{{ $reportData['user_report_cnic'] }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                </div>

                <!-- Test Name -->
                <div class="mb-5">
                    <label for="user_report_name" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-clipboard mr-2 text-yellow-500"></i> Test Name
                    </label>
                    <input type="text" id="user_report_name" name="user_report_name" value="{{ $reportData['user_report_name'] }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                </div>

                <!-- Test Date -->
                <div class="mb-5">
                    <label for="user_report_date" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-calendar-day mr-2 text-purple-500"></i> Test Date
                    </label>
                    <input type="text" id="user_report_date" name="user_report_date" value="{{ $reportData['user_report_date'] }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                </div>

                <!-- Test Time -->
                <div class="mb-5">
                    <label for="user_report_time" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-clock mr-2 text-orange-500"></i> Test Time
                    </label>
                    <input type="text" id="user_report_time" name="user_report_time" value="{{ $reportData['user_report_time'] }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                </div>

                <!-- Test Price -->
                <div class="mb-5">
                    <label for="user_report_price" class="block mb-1 text-sm font-medium text-gray-700 flex items-center">
                        <i class="fas fa-dollar-sign mr-2 text-teal-500"></i> Test Price (Rs.)
                    </label>
                    <input type="number" id="user_report_price" name="user_report_price" value="{{ $reportData['user_report_price'] }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2" required>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" 
                    class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5">
                    <i class="fas fa-save mr-2"></i> Save Changes
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
