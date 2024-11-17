@extends('firebase.layouts.main')

@section('content')
    <h3 class="text-2xl font-semibold mb-6">View Lists of All Users to Add Report</h3>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white border ">
            <thead class="bg-blue-600 text-white">
                <tr class="bg-blue-600 text-white">
                  
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
                    <tr class="bg-white border-b hover:bg-gray-50">
                    
                        <td class="px-6 py-4">
                            {{ $user['user_name'] ?? 'NA' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user['user_email'] ?? 'NA' }}
                        </td>
                        <td class="px-6 py-4 flex items-center gap-2">
                            <a href="{{ url( 'viewsusersappointments/' . $key ) }}">
                                <button class="flex items-center bg-red-500 text-white hover:bg-red-700 hover:text-black rounded-md px-2 py-1 text-sm font-semibold">
                                    <!-- Appointment Icon -->
                                    <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    View Appointment
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
