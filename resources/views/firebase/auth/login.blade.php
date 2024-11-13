<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ez Health </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="{{ asset('assets/Browserpicture.svg') }}">

    @vite('resources/css/app.css')
   
</head>
<body class="bg-gray-50">

    <!-- Header Section -->
    <header class="flex items-center justify-between bg-white border-b border-gray-200 px-6 py-2 shadow-md">
        <h1 class="text-xl font-bold text-gray-800">Ez Health</h1>
      
        
        

    </header>

    <!-- Error and Session Messages -->
    <section class="flex items-center h-auto p-6">
        <div class="flex-1 h-auto max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">

            <!-- Session or Error Messages -->
            <div class="w-full">
                @if($errors->any())
                    <div class="bg-red-100 text-red-700 px-4 py-2 mb-4 rounded w-full">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4 w-full">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif
            </div>

            <!-- Login Form Section -->
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <!-- Left side with background image -->
                <div class="h-32 md:h-auto md:w-1/2" style="background-image: url('{{ asset('assets/Background_loginimage.jpg') }}'); background-size: cover; background-position: center;">
                    <!-- Background image set inline -->
                </div>

                <!-- Right side with form -->
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-lg font-semibold text-gray-700">
                            Login to Admin Panel
                        </h1>

                        <!-- Login Form -->
                        <form class="space-y-4 md:space-y-6" action="{{ url('loginadmin') }}" method="POST">
                            @csrf
                            @method('post')

                            <!-- Admin Email -->
                            <div class="relative">
                                <label for="admin_email" class="block mb-2 text-sm font-medium text-gray-700">Your email</label>
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <span class="px-3 text-gray-500"><i class="fas fa-envelope"></i></span>
                                    <input
                                        type="email"
                                        name="admin_email"
                                        id="admin_email"
                                        class="block w-full p-2 text-sm text-gray-700 rounded-lg focus:ring-primary-600 focus:border-primary-600"
                                        placeholder="name@company.com"
                                        required
                                    />
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="relative">
                                <label for="admin_password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <span class="px-3 text-gray-500"><i class="fas fa-lock"></i></span>
                                    <input
                                        type="password"
                                        name="admin_password"
                                        id="admin_password"
                                        class="block w-full p-2 text-sm text-gray-700 rounded-lg focus:ring-primary-600 focus:border-primary-600"
                                        placeholder="••••••••"
                                        required
                                    />
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="w-full px-4 py-2 mt-4 text-sm font-medium text-center text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple"
                            >
                                Log in
                            </button>

                            <hr class="my-8" />

                            <!-- Footer Text -->
                            <p class="mt-4 text-sm font-light text-black">
                                If you don't have access to login, <span class="text-red-500">Please Visit Admin Office.</span>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-black text-white border-t border-gray-200 text-center p-4">
        <p class="text-white">© 2024 Ez Health | <a href="#" class="text-red-600 hover:underline">Project Ownership</a></p>
    </footer>

</body>
</html>
