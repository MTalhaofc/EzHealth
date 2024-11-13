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

    <!-- Users Table Section -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-blue-600">
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                        User ID
                    </th>
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
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            {{ $user['userid'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $user['username'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $user['useremail'] }}
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
    <div class="mt-10">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Add New User</h2>

        <form action="{{ url('add_user') }}" method="POST" class="max-w-lg mx-auto bg-white shadow-md p-6 rounded-lg">
            @csrf

            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Your Name</label>
                <input type="text" id="username" name="username" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="useremail" class="block text-sm font-medium text-gray-700">Your Email</label>
                <input type="email" id="useremail" name="useremail" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <div class="mb-4">
                <label for="usercnic" class="block text-sm font-medium text-gray-700">Your CNIC</label>
                <input type="text" id="usercnic" name="usercnic" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
            </div>

            <button type="submit" class="w-full bg-black text-white py-2 rounded-lg hover:bg-black/80 transition duration-300">
                Add New User
            </button>
        </form>
    </div>
</div>

@endsection
