@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto p-6">
    <!-- Heading Section -->
    <h1 class="text-3xl font-semibold text-gray-800 mb-1">View All Users / To Add Reports</h1>

    <!-- Display Status -->
    <div class="container mx-auto p-6">
        <!-- Display Success or Error Message -->
        @if(session('status'))
            <div class="p-4 mb-6 @if(session('status') == 'Report deleted successfully.') bg-green-100 text-green-700 @else bg-red-100 text-red-700 @endif rounded-lg shadow-md">
                <p>{{ session('status') }}</p>
            </div>
        @endif
    </div>

    <!-- Search Section -->
    <div class="flex justify-center my-2">
        <form method="GET" action="{{ url('search_users_report') }}" class="flex items-center w-full max-w-2xl">
            @csrf
            <!-- Search Box -->
            <div class="relative flex-grow">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">
                    <i class="fas fa-search"></i>
                </span>
                <input
                    type="text"
                    name="query"
                    placeholder="Search by name"
                    class="w-full px-10 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    value="{{ request('query') }}"
                />
                @if(request('query'))
                    <a
                        href="{{ url('viewallreports') }}"
                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700"
                    >
                        <i class="fas fa-times"></i>
                    </a>
                @endif
            </div>
            
            <!-- Search Button -->
            <button
                type="submit"
                class="ml-2 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none"
            >
                Search
            </button>
        </form>
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
                        CNIC
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (empty($users))
                    <tr>
                        <td colspan="4" class="text-center py-4">No users found.</td>
                    </tr>
                @else
                    @foreach ($users as $key => $user)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{ $user['user_name'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user['user_email'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $user['user_cnic'] }}
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
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
