@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto p-6">
    <!-- Heading Section -->
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">View All Users / To Add Reports</h1>

    <!-- Display Status -->
 

    <div class="container mx-auto p-6">
        <!-- Display Success or Error Message -->
        @if(session('status'))
            <div class="p-4 mb-6 @if(session('status') == 'Report deleted successfully.') bg-green-100 text-green-700 @else bg-red-100 text-red-700 @endif rounded-lg shadow-md">
                <p>{{ session('status') }}</p>
            </div>
        @endif
    
        <!-- Your other content (list of reports, etc.) -->
    </div>
    <!-- Users Table Section -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-blue-600">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr class="bg-white border-b">
                        
                        <td class="px-6 py-4">
                            {{ $user['user_name'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user['user_email'] }}
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ url('view_reports/' . $key) }}">
                                <button class="bg-red-500 text-white  hover:bg-red-700 py-1 px-2 rounded-lg focus:outline-none">
                                    <i class="fas fa-eye mr-2"></i>
                                    View Reports
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Form to Add New User -->
   
</div>

@endsection
