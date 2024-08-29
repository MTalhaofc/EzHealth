@extends('firebase.layouts.app')
@section('content')

<h2>Edit admin</h2>

<a href="{{ route('dashboard') }}">
    <h3 class="text-blue-500 hover:underline cursor-pointer">Back to dashboard</h3>
</a>



<form  class="max-w-sm mx-auto" action="{{ url('updateadmin/'.$key) }} " method="POST">
    @csrf
@method('PUT')

    <div class="mb-3">
        <label for="email" class="block mb-1 text-sm font-medium text-gray-900 ">Update Role</label>
        <input type="text" id="admin_role" name="admin_role"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 "
            value="{{$editadmindata['admin_role']}}" required />
    </div>
    <div class="mb-3">
        <label for="email" class="block mb-1 text-sm font-medium text-gray-900 ">Update Your email</label>
        <input type="email" id="admin_email " name="admin_email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 "
           value=" {{$editadmindata['admin_email']}}" required />
    </div>
    <div class="mb-3">
        <label for="password" class="block mb-1 text-sm font-medium text-gray-900 "> Update Your password</label>
        <input type="password" id="admin_password" name="admin_password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1.5 "
            placeholder="Enter Your New Password" required />
    </div>

    <button type="submit"
        class="text-white bg-red-700 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center ">
        Update Admin</button>
</form>
@endsection