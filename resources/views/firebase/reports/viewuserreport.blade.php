@extends('firebase.layouts.app')
@section('content')

<h1>view this user  report here
    

</h1>


<h2>specific user report</h2>



<a href="{{ route('add_reports', ['id' => $key]) }}">
    <button class="text-white bg-blue-700 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-3 py-1.5 text-center">
        Add Report
    </button>
</a>


<br>
<br>
@if (session('status'))
<h4>{{ session('status') }}</h4>
@endif

@endsection