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
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <h5 class="mb-3 text-lg font-semibold text-gray-900 text-center dark:text-white">
          Total Admins: {{ $totaladmins }}
        </h5>
        <table class="w-full whitespace-no-wrap">
          <thead class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700">
            <tr>
              <th scope="col" class="px-4 py-3">Role</th>
              <th scope="col" class="px-4 py-3">Email</th>
              <th scope="col" class="px-4 py-3">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach($admins as $key => $admin)
              <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3">
                  <div class="flex items-center text-sm">
                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                      <img
                        class="object-cover w-full h-full rounded-full"
                        src="https://img.icons8.com/windows/32/dc2626/user-male-circle.png" 
                        alt="Profile picture"
                      />
                      <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                      <p class="font-semibold dark:text-white">{{ $admin['admin_role'] }}</p>
                      <p class="text-xs text-gray-600 dark:text-gray-400">{{ $admin['admin_email'] }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 text-sm dark:text-gray-400">{{ $admin['admin_email'] }}</td>
                <td class="px-4 py-3 text-sm">
                  <div class="flex items-center space-x-2">
                    <!-- Edit Button with Icon -->
                    <a href="{{ url('editadmin/' . $key) }}" class="flex items-center">
                      <button
                        class="flex items-center justify-between px-2 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-md active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-500 dark:hover:bg-blue-600"
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5 mr-2"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                          ></path>
                        </svg>
                        Edit
                      </button>
                    </a>
  
                    <!-- Delete Button with Icon -->
                    <a href="{{ url('deleteadmin/' . $key) }}">
                      <button
                        type="submit"
                        class="flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-blue dark:bg-red-500 dark:hover:bg-red-600"
                        aria-label="Delete"
                      >
                      <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="20" viewBox="0 0 24 24"
                      style="fill:#fff;">
                      <path d="M 10 2 L 9 3 L 3 3 L 3 5 L 4.109375 5 L 5.8925781 20.255859 L 5.8925781 20.263672 C 6.023602 21.250335 6.8803207 22 7.875 22 L 16.123047 22 C 17.117726 22 17.974445 21.250322 18.105469 20.263672 L 18.107422 20.255859 L 19.890625 5 L 21 5 L 21 3 L 15 3 L 14 2 L 10 2 z M 6.125 5 L 17.875 5 L 16.123047 20 L 7.875 20 L 6.125 5 z"></path>
                      </svg>
                        Delete
                      </button>
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  
  
  
    

    
@endsection