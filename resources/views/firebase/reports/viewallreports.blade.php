@extends('firebase.layouts.app')
@section('content')

<h1>view all users/to add reports
    
</h1>
@if (session('status'))
<h4>{{ session('status') }}</h4>
@endif


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
                    <a href="{{url('view_reports/' .$key)}}" >
                    <button class="bg-red-500 text-white hover:text-black hover:bg-red-700">View Reports</button>
                </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


<form class="max-w-sm mx-auto" action="{{url('add_user')}}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label for="name">Your name</label>
        <input type="text" id="username" name="username"
            
             required />
    </div>
    <div class="mb-3">
        <label for="useremail" >Your email</label>
        <input type="text" id="useremail" name="useremail"
            
             required />
    </div>
    <div class="mb-3">
        <label for="usercnic" >Your Cnic</label>
        <input type="text" id="usercnic" name="usercnic"
            
             required />
    </div>
    <button class="bg-black text-white" type="submit" >Add
        New user</button>
</form>
@endsection
