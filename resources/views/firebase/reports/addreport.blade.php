@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full w-auto mx-auto">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Upload User Report</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('upload_reports', ['id' => $key]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Patient Name -->
            <div class="mb-5">
                <label for="patient_name" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-user mr-2 text-blue-500"></i> Patient Name
                </label>
                <input type="text" id="patient_name" name="user_report_patient_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter patient name" readonly required value="{{ old('user_report_patient_name', $addreportdata['user_name'] ?? '') }}"/>
            </div>

            <!-- Report CNIC -->
            <div class="mb-5">
                <label for="report_cnic" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-id-card mr-2 text-green-500"></i> Report CNIC
                </label>
                <input type="text" id="report_cnic" name="user_report_cnic"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter CNIC" readonly required value="{{ old('user_report_cnic', $addreportdata['user_cnic'] ?? '') }}"/>
            </div>

            <!-- Parent CNIC -->
            <div class="mb-5">
                <label for="parent_id" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-key mr-2 text-yellow-500"></i> Parent CNIC
                </label>
                <input type="text" id="parent_id" name="user_report_parent_cnic"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter parent CNIC" required value="{{ old('user_report_parent_cnic', '') }}"/>
            </div>

            <!-- Test Date -->
            <div class="mb-5">
                <label for="test_date" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-calendar-alt mr-2 text-orange-500"></i> Test Date (dd/mm/yyyy)
                </label>
                <input type="date" id="test_date" name="user_report_date"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter test date" required value="{{ old('user_report_date', '') }}"/>
            </div>

            <!-- Test Time -->
            <div class="mb-5">
                <label for="test_time" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-clock mr-2 text-purple-500"></i> Test Time
                </label>
                <input type="time" id="test_time" name="user_report_time"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    required value="{{ old('user_report_time', '') }}"/>
            </div>

            <!-- Report Image -->
            <div class="mb-5">
                <label for="report_image" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-file-image mr-2 text-red-500"></i> Report Image (JPEG/PNG)
                </label>
                <input type="file" id="report_image" name="report_image"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    accept="image/*" required/>
            </div>

            <!-- Test ID -->
            <div class="mb-5">
                <label for="test_id" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-id-badge mr-2 text-blue-500"></i> Test ID
                </label>
                <input type="number" id="test_id" name="user_report_test_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Test ID" required value="{{ old('user_report_test_id', '1') }}"/>
            </div>

            <!-- Price -->
            <div class="mb-5">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-700">
                    <i class="fas fa-money-bill mr-2 text-green-500"></i> Price
                </label>
                <input type="number" id="price" name="user_report_price"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2"
                    placeholder="Enter price" required value="{{ old('user_report_price', '') }}"/>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center flex items-center justify-center">
                <i class="fas fa-upload mr-2"></i> Upload Report
            </button>
        </form>
    </div>
</div>

@endsection
