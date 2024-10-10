@extends('firebase.layouts.app')
@section('content')
    <h3>VIEW LISTS OF ALL USERS TO ADD REPORT</h3>


    <table class="min-w-full bg-white border">
        <thead>
            <tr class="bg-gray-200">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    User ID
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                    <td class="px-6 py-4">
                        <a href="{{ url( 'viewsusersappointments/' . $key ) }}">
                            <button class="bg-red-500 text-white hover:text-black hover:bg-red-700">View Appointment</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
