@extends('firebase.layouts.app')
@section('content')
<h1>View all tests</h1>


<h3> buttton for see detailed of test</h3>


<h4> button of adding new test</h4>


<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-6 text-center">All Tests</h2>

    <!-- Status Message -->
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <a  href="{{route('add_test')}}">
<button class="bg-red-700 text-white hover:bg-black" >Add New Test Details</button>
</a>





@if (!empty($tests))
<div class="overflow-x-auto">
    <table class="min-w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Test Name</th>
                <th class="py-3 px-6 text-left">Test Price</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            @foreach ($tests as $testKey => $test) {{-- Assuming $testKey is the Firebase key --}}
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left">{{ $test['test_name'] }}</td>
                    <td class="py-3 px-6 text-left">Rs.{{ $test['test_price'] }}</td>
                    <td class="py-3 px-6 text-left">
                        <a href="{{ route('view_test', ['id' => $testKey]) }}"
                           class="text-blue-600 hover:text-blue-900 font-medium">View More</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="text-center text-gray-600">
    <p>No tests available at the moment.</p>
</div>
@endif
    
</div>


@endsection