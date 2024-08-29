@extends('firebase.layouts.app')
@section('content')

<h1>Dashboard</h1>

@if (session('status'))
    <h4>{{ session('status') }}</h4>
@endif

<br>
<br>
<br>


<a href="{{ route('add_admin') }}">
    <h3 class="text-blue-500 hover:underline cursor-pointer">ADD ADMIN</h3>
</a>
<a href="{{ route('view_admin') }}">
    <h3 class="text-blue-500 hover:underline cursor-pointer">VIEW ADMIN</h3>
</a>

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