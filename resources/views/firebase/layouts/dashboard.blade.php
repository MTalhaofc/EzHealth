@extends('firebase.layouts.main')
@section('content')

@if (session('status'))
    <div class="flex justify-between items-center mb-2">
        <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>
        <div class="p-4 mb-4 bg-green-100  border-r-4 border-green-500">
        <h4 class="text-lg  text-green-800 font-semibold">{{ session('status') }}</h4>
    </div>
    </div>
@else
    <h1 class="text-3xl font-semibold text-gray-800 mb-2">Dashboard</h1>
@endif

@php
    $role = session('admin_role');
@endphp

@if ($role)
    <div class="p-4 mb-4 bg-blue-100 text-blue-800 border-l-4 border-blue-500">
        <p class="font-semibold">You are logged in as: <span class="text-lg">{{ ucfirst($role) }}</span></p>
    </div>
@else
    <div class="p-4 mb-4 bg-red-100 text-red-800 border-l-4 border-red-500">
        <p class="font-semibold">Role information is not available.</p>
    </div>
@endif


<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

    <div class="flex items-center p-4 bg-white rounded-lg shadow-lg">
      <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full">
        <i class="fas fa-users fa-lg"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600">Total Users</p>
        <p class="text-lg font-semibold text-gray-700">{{ $totalusers }}</p>
      </div>
    </div>
  
    <div class="flex items-center p-4 bg-white rounded-lg shadow-lg">
      <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full">
        <i class="fas fa-file-alt fa-lg"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600">Reports</p>
        <p class="text-lg font-semibold text-gray-700">{{ $totalreports }}</p>
      </div>
    </div>
  
    <div class="flex items-center p-4 bg-white rounded-lg shadow-lg">
      <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full">
        <i class="fas fa-vial fa-lg"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600">Tests</p>
        <p class="text-lg font-semibold text-gray-700">{{ $totaltests }}</p>
      </div>
    </div>
  
    <div class="flex items-center p-4 bg-white rounded-lg shadow-lg">
      <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full">
        <i class="fas fa-home fa-lg"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600">Home Appointments</p>
        <p class="text-lg font-semibold text-gray-700">{{ $totalappointments }}</p>
      </div>
    </div>
  
    <div class="flex items-center p-4 bg-white rounded-lg shadow-lg">
      <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full">
        <i class="fas fa-clock fa-lg"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600">Pending Appointments</p>
        <p class="text-lg font-semibold text-gray-700">{{$pendingAppointmentCount}}</p>
      </div>
    </div>
  
    <div class="flex items-center p-4 bg-white rounded-lg shadow-lg">
      <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full">
        <i class="fas fa-user-shield fa-lg"></i>
      </div>
      <div>
        <p class="mb-2 text-sm font-medium text-gray-600">Admins</p>
        <p class="text-lg font-semibold text-gray-700">{{ $totaladmins }}</p>
      </div>
    </div>
  
  </div>
  
@endsection
