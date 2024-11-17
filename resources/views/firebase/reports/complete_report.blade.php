@extends('firebase.layouts.main')

@section('content')

<div class="container mx-auto p-6">
    <!-- Page Title -->
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Report Details</h1>

    <!-- Display Success or Error Message -->
    @if(session('status'))
        <div class="p-4 mb-6 bg-red-100 text-red-700 rounded-lg shadow-md">
            <p>{{ session('status') }}</p>
        </div>
    @endif

    @if($reportData)
        <!-- Report Details Card -->
        <div class="bg-white p-6 rounded-2xl shadow-xl mx-auto max-w-4xl">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Details for Report ID: {{ $reportData['report_id'] ?? 'NA' }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
               
                    <div class="flex items-center">
                        <i class="fas fa-user text-blue-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Patient Name:</h4>
                    </div>
                    <p class="text-gray-700">{{ $reportData['user_report_patient_name'] }}</p>
               
                    <div class="flex items-center">
                        <i class="fas fa-id-card text-red-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Parent CNIC:</h4>
                    </div>
                    <p class="text-gray-700">{{ $reportData['user_report_parent_cnic'] }}</p>
              
                    <div class="flex items-center">
                        <i class="fas fa-id-card text-green-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Patient CNIC:</h4>
                    </div>
                    <p class="text-gray-700">{{ $reportData['user_report_cnic'] }}</p>
               
                    <div class="flex items-center">
                        <i class="fas fa-clipboard text-yellow-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Test Name:</h4>
                    </div>
                    <p class="text-gray-700">{{ $reportData['user_report_name'] }}</p>
               

          
                    <div class="flex items-center">
                        <i class="fas fa-calendar-day text-purple-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Test Date:</h4>
                    </div>
                    <p class="text-gray-700">{{ $reportData['user_report_date'] }}</p>
              
                    <div class="flex items-center">
                        <i class="fas fa-clock text-orange-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Test Time:</h4>
                    </div>
                    <p class="text-gray-700">{{ $reportData['user_report_time'] }}</p>
               
                
                    <div class="flex items-center">
                        <i class="fas fa-dollar-sign text-teal-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Test Price:</h4>
                    </div>
                    <p class="text-gray-700">PKR {{ number_format($reportData['user_report_price'], 2) }}</p>
                
                
                    <div class="flex items-center">
                        <i class="fas fa-hashtag text-pink-500 mr-2"></i>
                        <h4 class="font-medium text-gray-800">Test ID:</h4>
                    </div>
                    <p class="text-gray-700">{{ $reportData['user_report_test_id'] }}</p>
              
            </div>

            <!-- Report Image -->
            @if(isset($reportData['user_report_url']))
                <div class="mt-6 text-center">
                    <h4 class="font-medium text-gray-800">Report Image:</h4>
                    <img src="{{ $reportData['user_report_url'] }}" alt="Report Image" class="max-w-xs h-auto mx-auto rounded-lg shadow-md mt-4">
                </div>
            @endif

            <!-- Download Button -->
            @if(isset($reportData['user_report_url']))
                <div class="mt-6 text-center">
                    <a href="{{ $reportData['user_report_url'] }}" download>
                        <button class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-2.5">
                            <i class="fas fa-download mr-2"></i> Download Report
                        </button>
                    </a>
                </div>
            @endif

            <!-- Edit and Delete Buttons -->
            <div class="mt-6 flex justify-center space-x-6">
                <!-- Edit Report Button -->
                <a href="{{ route('edit_report', ['reportKey' => $reportKey]) }}">
                    <button class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-6 py-2.5">
                        <i class="fas fa-edit mr-2"></i> Edit Report
                    </button>
                </a>

                <!-- Delete Report Button (opens modal) -->
                <button onclick="openDeleteModal()" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5">
                    <i class="fas fa-trash-alt mr-2"></i> Delete Report
                </button>
            </div>
        </div>
    @else
        <!-- If no report data is found -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <p class="text-gray-700">No details available for this report.</p>
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto bg-gray-900 bg-opacity-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-md relative z-60">
            <div class="p-6 text-center">
                <h3 class="text-lg font-bold text-gray-800">Confirm Delete</h3>
                <p class="text-gray-600 mt-2">Are you sure you want to delete this report?</p>
                <div class="mt-6 flex justify-center space-x-4">
                    <!-- Cancel Button -->
                    <button onclick="closeDeleteModal()" class="text-gray-600 bg-gray-200 hover:bg-gray-300 focus:ring-4 focus:outline-none focus:ring-gray-400 font-medium rounded-lg text-sm px-6 py-2.5">
                        Cancel
                    </button>
                    <!-- Confirm Delete Form -->
                    <form id="deleteReportForm" action="{{ route('delete_report', ['reportKey' => $reportKey]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
                            <i class="fas fa-trash-alt mr-2"></i> Delete Report
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openDeleteModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

@endsection
