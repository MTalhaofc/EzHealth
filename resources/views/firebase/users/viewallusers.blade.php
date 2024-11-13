@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto p-6">
    <!-- Heading Section -->
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">View All Users / To Add Reports</h1>

    <!-- Display Status -->
    @if (session('status'))
        <div class="bg-green-100 text-green-700 px-4 py-2 mb-4 rounded">
            <h4>{{ session('status') }}</h4>
        </div>
    @endif

    <!-- New User Button -->
    <div class="flex justify-end mb-4">
        <a href="{{route('add_users')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-user-plus mr-2"></i> Add New User
        </a>
    </div>

    <!-- Users Table Section -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-blue-600">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Sr No.
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        CNIC
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Number
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($users as $index => $user) --}}
                    <tr class="bg-white border-b hover:bg-gray-100">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            {{-- {{ $index + 1 }} --}}
                        </th>
                        <td class="px-6 py-4">
                            {{-- {{ $user['username'] }} --}}
                        </td>
                        <td class="px-6 py-4">
                            {{-- {{ $user['usercnic'] }} --}}
                        </td>
                        <td class="px-6 py-4">
                            {{-- {{ $user['usernumber'] }} --}}
                        </td>
                        <td class="px-6 py-4 text-center">
                            {{-- <a href="{{ url('view_reports/' . $index) }}"> --}}
                                <button class="bg-red-500 text-white hover:bg-red-700 py-1 px-2 rounded-lg focus:outline-none">
                                    <i class="fas fa-eye mr-2"></i> View Details
                                </button>
                            </a>
                        </td>
                    </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

@endsection
