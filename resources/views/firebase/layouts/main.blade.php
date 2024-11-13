<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ez Health</title>
    <link rel="icon" href="{{ asset('assets/Browserpicture.svg') }}">

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body class="flex flex-col min-h-screen bg-gray-50">

    <!-- Header -->
    <header class="flex items-center justify-between bg-white border-b border-gray-200 px-4 py-2 shadow-md">
        <h1 class="text-xl font-bold text-gray-800">Ez Health</h1>
        <div class="flex items-center space-x-4">
            <!-- Notification Icon -->
            <a href="{{ route('notifications') }}" class="relative text-red-600 hover:text-red-700">
                <i class="fas fa-bell text-xl"></i>
                <!-- Notification Dot (optional) -->
                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
            </a>
    
            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center text-red-600 hover:text-white font-semibold py-2 px-4 rounded hover:bg-red-600">
                    <i class="fas fa-sign-out-alt text-xl"></i>
                    <span class="ml-2">Logout</span>
                </button>
            </form>
        </div>
    </header>
    
    @php
    $role = session('admin_role');
@endphp
    <!-- Main content layout -->
    <div class="flex flex-1">

        <!-- Sidebar -->
        <aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0 border-r border-gray-200 shadow-lg">
            <div class="py-4 text-gray-500">
                <ul>
                    <!-- Dashboard Link -->
                    <li class="relative px-6 py-3 {{ request()->is('dashboard') ? 'text-gray-800' : 'text-gray-500' }}">
                        @if(request()->is('dashboard'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="{{ route('dashboard') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
        
                    <!-- Reports Link -->
                    <li class="relative px-6 py-3 {{ request()->is('viewallreports') ? 'text-gray-800' : 'text-gray-500' }}">
                        @if(request()->is('viewallreports'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="{{ route('viewallreports') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                            </svg>
                            <span class="ml-4">Reports</span>
                        </a>
                    </li>
        
                    <!-- Users Link -->
                    <li class="relative px-6 py-3 {{ request()->is('users') ? 'text-gray-800' : 'text-gray-500' }}">
                        @if(request()->is('viewallusers'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="{{'viewallusers'}}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                                <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                            </svg>
                            <span class="ml-4">Users</span>
                        </a>
                    </li>
        
                    <!-- Home Testing Link -->
                    <li class="relative px-6 py-3 {{ request()->is('viewallappointments') ? 'text-gray-800' : 'text-gray-500' }}">
                        @if(request()->is('viewallappointments'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="{{ route('viewallappointments') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"></path>
                            </svg>
                            <span class="ml-4">Home Testing</span>
                        </a>
                    </li>
        
                    <!-- Tests Link -->
                    <li class="relative px-6 py-3 {{ request()->is('viewalltests') ? 'text-gray-800' : 'text-gray-500' }}">
                        @if(request()->is('viewalltests'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="{{ route('viewalltests') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                            <span class="ml-4">Tests</span>
                        </a>
                    </li>
        
                  
                    
        
                    @if ($role === 'Super Admin')
                    <!-- View Admin Link -->
                    <li class="relative px-6 py-3 {{ request()->is('view_admin') ? 'text-gray-800' : 'text-gray-500' }}">
                        @if(request()->is('view_admin'))
                            <span class="absolute inset-y-0 left-0 w-1 bg-red-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
                        @endif
                        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800" href="{{ route('view_admin') }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="ml-4">View Admin</span>
                        </a>
                    </li>
                    @endif
                </ul>
        
                <!-- Add Admin Button (if Super Admin) -->
                @if ($role === 'Super Admin')
                <div class="px-6 my-6">
                    <a href="{{ route('add_admin') }}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white bg-red-600 rounded-lg hover:bg-red-700">
                        Add New Admin
                        <span class="ml-2" aria-hidden="true">+</span>
                    </a>
                </div>
                @endif
            </div>
        </aside>
        
        
        

        <!-- Main content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-black text-white border-t border-gray-200 text-center p-4">
        <p class="text-white">© 2024 Ez Health | <a href="#" class="text-red-600 hover:underline">Project Ownership</a></p>
    </footer>

</body>
</html>
