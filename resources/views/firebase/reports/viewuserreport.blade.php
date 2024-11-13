@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <!-- Page Title -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6">User Report</h1>

    <!-- Display Success or Error Message -->
    @if(session('status'))
        <div class="p-4 mb-6 bg-red-100 text-red-700 rounded-lg shadow-md">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    <!-- Check if the report data exists -->
    @if($viewreportdata)
        <!-- Displaying Report Data -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Report for User ID: {{ $key }}</h2>

            <!-- Display user report details -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                    <h4 class="font-medium text-gray-800">Patient Name:</h4>
                    <p class="text-gray-700">{{ $viewreportdata['patient_name'] }}</p>
                </div>

                <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                    <h4 class="font-medium text-gray-800">Test Date:</h4>
                    <p class="text-gray-700">{{ $viewreportdata['test_date'] }}</p>
                </div>
            </div>

            <div class="p-4 bg-gray-100 rounded-lg shadow-md mt-4">
                <h4 class="font-medium text-gray-800">Report ID:</h4>
                <p class="text-gray-700">{{ $viewreportdata['report_id'] }}</p>
            </div>

            <!-- Optionally, display the report image -->
            @if(isset($viewreportdata['report_image']))
                <div class="mt-6">
                    <img src="{{ $viewreportdata['report_image'] }}" alt="Report Image" class="w-full h-auto rounded-lg shadow-md">
                </div>
            @endif
        </div>
    @else
        <!-- If no report data found -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-700">No report data available for this user.</p>

            <!-- Add Report Button -->
            <div class="mt-6">
                <a href="{{ route('add_reports', ['id' => $key]) }}">
                    <button class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
                        Add Report
                    </button>
                </a>
            </div>
        </div>
    @endif
</div>

@endsection
