<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ez Health | Ownership</title>
    <link rel="icon" href="{{ asset('assets/Browserpicture.svg') }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="flex items-center justify-between bg-white border-b border-gray-200 px-6 py-2 shadow-md">
        <h1 class="text-xl font-bold text-gray-800">Ez Health</h1>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-6">
        <!-- Back Button -->
        <div class="">
            <a href="javascript:history.back()" class="text-white bg-black p-2 rounded-md hover:text-black hover:bg-white font-semibold items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back
            </a>
        </div>
        <!-- University Name and Logo -->
        <div class="text-center mb-1">
            <div class="flex justify-center items-center mb-4">
                <!-- Placeholder for Comsats University Logo -->
                <img src="{{ asset('assets/comsatslogo.jpeg') }}" alt="Comsats University Logo" class="w-16 h-16 mr-4">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Comsats University Islamabad</h1>
                    <h2 class="text-xl text-gray-600">Sahiwal Campus</h2>
                </div>
            </div>
        </div>

      <!-- Supervisor Section -->
<section class="mb-4">
    <h2 class="text-2xl font-bold text-gray-800 text-center mb-2">Project Supervisor</h2>
    <div class="flex items-center justify-center bg-white shadow-lg rounded-lg p-6 w-full sm:w-1/2 mx-auto">
        <!-- Supervisor Picture -->
        <div class="w-24 h-24 bg-gray-200 rounded-full mr-6">
            <img src="{{ asset('assets/Jamil.png') }}" alt="Mr. Muhammad Jamil" class="w-full h-full object-cover rounded-full">
        </div>
        <div>
            <h3 class="text-xl font-semibold text-gray-800">Mr. Muhammad Jamil</h3>
            <p class="text-gray-600">Supervisor</p>
            <div class="flex mt-2 space-x-4">
                <a href="#" class="text-blue-600 hover:text-blue-800">
                    <i class="fab fa-linkedin fa-lg"></i>
                </a>
                <a href="#" class="text-gray-800 hover:text-black">
                    <i class="fab fa-github fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
</section>


        <!-- Students Section -->
        <section>
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Project Students</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Student 1 -->
                <div class="flex items-center bg-white shadow-lg rounded-lg p-6">
                    <div class="w-24 h-24 bg-gray-200 rounded-full mr-6">
                        <img src="{{ asset('assets/talha.png') }}" alt="Muhammad Talha" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Muhammad Talha</h3>
                        <p class="text-gray-600">FA21-BCS-114</p>
                        <div class="flex mt-2 space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <i class="fab fa-linkedin fa-lg"></i>
                            </a>
                            <a href="#" class="text-gray-800 hover:text-black">
                                <i class="fab fa-github fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Student 2 -->
                <div class="flex items-center bg-white shadow-lg rounded-lg p-6">
                    <div class="w-24 h-24 bg-gray-200 rounded-full mr-6">
                        <img src="{{ asset('assets/mahad.jpeg') }}" alt="Muhammad Mahad" class="w-full h-full object-cover rounded-full">
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Muhammad Mahad</h3>
                        <p class="text-gray-600">FA21-BCS-120</p>
                        <div class="flex mt-2 space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <i class="fab fa-linkedin fa-lg"></i>
                            </a>
                            <a href="#" class="text-gray-800 hover:text-black">
                                <i class="fab fa-github fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white border-t border-gray-200 text-center p-4">
        <p>© 2024 Ez Health</p>
    </footer>
</body>
</html>
