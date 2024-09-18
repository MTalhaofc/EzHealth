@extends('firebase.layouts.app')
@section('content')

<h1>upload report here
    
</h1>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm mx-auto">
    <h2 class="text-2xl font-bold mb-6 text-center">Upload User Report</h2>
    <form action="{{ route('upload_reports', ['id' => $key]) }}" method="POST" enctype="multipart/form-data">
      
            @csrf

        <!-- Patient Name -->
        <div class="mb-3">
            <label for="patient_name" class="block mb-1 text-sm font-medium text-gray-900">Patient Name</label>
            <input type="text" id="patient_name" name="patient_name"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                placeholder="Enter patient name" required />
        </div>

        <!-- Patient CNIC (Report ID) -->
        <div class="mb-3">
            <label for="patient_cnic" class="block mb-1 text-sm font-medium text-gray-900">Patient CNIC (Report ID)</label>
            <input type="text" id="report_id" name="report_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                placeholder="Enter patient CNIC" required />
        </div>

        <!-- Parent ID -->
        <div class="mb-3">
            <label for="parent_id" class="block mb-1 text-sm font-medium text-gray-900">Parent ID (4 digits)</label>
            <input type="number" id="parent_id" name="parent_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                placeholder="1234" min="1000" max="9999" required />
        </div>

        <!-- Test Date -->
        <div class="mb-3">
            <label for="test_date" class="block mb-1 text-sm font-medium text-gray-900">Test Date</label>
            <input type="date" id="test_date" name="test_date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                required />
        </div>

        <!-- Test Time -->
        <div class="mb-3">
            <label for="test_time" class="block mb-1 text-sm font-medium text-gray-900">Test Time</label>
            <input type="time" id="test_time" name="test_time"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                required />
        </div>

        <!-- Report Image -->
        <div class="mb-3">
            <label for="report_image" class="block mb-1 text-sm font-medium text-gray-900">Report Image (JPEG/PNG)</label>
            <input type="file" id="report_image" name="report_image"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5"
                accept="image/*" required />
        </div>

        <!-- Submit Button -->
        <button type="submit"
            class="text-white bg-red-700 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center">
            Upload Report
        </button>
    </form>
</div>

@endsection