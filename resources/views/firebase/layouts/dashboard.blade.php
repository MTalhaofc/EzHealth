@extends('firebase.layouts.app')
@section('content')

    <h1>Dashboard</h1>

    @if (session('status'))
        <h4>{{ session('status') }}</h4>
    @endif

    <br>
    <br>
    @php
        $role = session('admin_role');
    @endphp

    @if ($role)
        <p>You are logged in as: {{ ucfirst($role) }}</p>

        {{-- Display admin-specific links only for super admins --}}
        @if ($role === 'superadmin')
            <a href="{{ route('add_admin') }}">
                <h3 class="text-blue-500 hover:underline cursor-pointer">ADD ADMIN</h3>
            </a>
            <a href="{{ route('view_admin') }}">
                <h3 class="text-blue-500 hover:underline cursor-pointer">VIEW ADMIN</h3>
            </a>
        @endif
        <a href="{{route('viewallreports')}}">
            <h3 class="text-blue-500 hover:underline cursor-pointer">Add Report</h3>
        </a>
        <br>
        <a href="">
            <h3 class="text-blue-500 hover:underline cursor-pointer">Home Testing</h3>
        </a>
        <br>

        <a href="">
            <h3 class="text-blue-500 hover:underline cursor-pointer">View Users</h3>
        </a>
        <a href="{{route('viewalltests')}}">
            <h3 class="text-blue-500 hover:underline cursor-pointer">Tests</h3>
        </a>


        {{-- Logout button --}}
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    @else
        <p>Role information is not available.</p>
    @endif

    {{-- <a href="{{ route('admin.page') }}">
    <h3 class="text-blue-500 hover:underline cursor-pointer"> ADMIN Settings</h3>
</a>
<a href="{{ route('admin.page') }}">
    <h3 class="text-blue-500 hover:underline cursor-pointer">ADD Reports</h3>
</a>
<a href="{{ route('admin.page') }}">
    <h3 class="text-blue-500 hover:underline cursor-pointer">Home Testing</h3> 
</a> --}}




@endsection
