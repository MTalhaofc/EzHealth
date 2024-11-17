@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <!-- Page Title -->
    <div class="flex flex-row justify-between">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">User Reports</h1>

    <!-- Display Success or Error Message -->
  

    <!-- Add Report Button (Placed at the top) -->
    <div class="mb-6 flex justify-end">
        <a href="{{ route('add_reports', ['id' => $key]) }}">
            <button class="flex items-center text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 shadow-md">
                <i class="fas fa-plus mr-2"></i> Add Report
            </button>
        </a>
    </div>
</div>
@if(session('status'))
<div class="p-4 mb-6 bg-red-100 text-red-700 rounded-lg shadow-lg">
    <p>{{ session('status') }}</p>
</div>
@endif
    <!-- Check if matched reports exist -->
    @if(!empty($matchedReports) && count($matchedReports) > 0)
        <!-- Displaying Matched Reports in a Table -->
        <div class="bg-white p-6 rounded-2xl shadow-xl">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Reports for User ID: {{ $key }}</h2>

            <div class="overflow-x-auto rounded-lg shadow-md">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead class="bg-blue-600 text-white rounded-t-lg">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Patient Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Test Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Test Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Price</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matchedReports as $reportKey => $report)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $report['user_report_patient_name'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $report['user_report_date'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $report['user_report_time'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $report['user_report_price'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-800">
                                    <a href="{{ route('view_complete_report', ['reportKey' => $reportKey]) }}">
                                        <button class="flex items-center text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 shadow-md">
                                            <i class="fas fa-eye mr-2"></i> View Complete Details
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <!-- If no matched reports are found -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-700">No reports found for this user.</p>
        </div>
    @endif
</div>

@endsection
