@extends('firebase.layouts.app')
@section('content')
<h1>
    View admins
</h1>

<a href="{{route('dashboard')}}">
    <h3 class="text-blue-500 hover:underline cursor-pointer">Back to dashboard</h3>
    </a>
    @if (session('status'))
    <h4>{{ session('status') }}</h4>
@endif



<div class="m-4">
    <div class="relative  shadow-md rounded-lg sm:rounded-lg">
        <h5 class="mb-3 text-lg font-semibold text-gray-900 justify-center">Total Admins: {{ $totaladmins }}</h5>
        <table class="w-full text-sm text-left  rtl:text-right text-gray-500 ">
            <thead class="text-xs text-white uppercase bg-gray-50 bg-red-600 ">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $key => $admin)
                    <tr class="bg-white border-b ">
                        <th scope="row" class="px-6 py-4 font-medium  whitespace-nowrap text-black">
                            {{ $admin['admin_role'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $admin['admin_email'] }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ url('editadmin/' . $key) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="{{ url('deleteadmin/' . $key) }}" >
                            
                                
                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ml-2">Delete</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    

    
@endsection