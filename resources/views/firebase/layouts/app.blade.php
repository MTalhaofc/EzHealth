<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/Browserpicture.svg') }}">

    <title>EzHealth</title>
    @vite('resources/css/app.css')

</head>
<body class="min-h-screen flex flex-col">

    <header class="shadow-2xl">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
            
                    <img class="ml-3 mt-1 mb-2 h-6 md:h-8" src="{{ asset('assets/EzHealth_logo_2.svg') }}" alt="Logo">
            
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="flex flex-col bg-gray-950 text-white">
        <div class="flex justify-start">
            <img class="h-10 ml-2" src="{{ asset('assets/EzHealth_logo.svg') }}">
        </div>
        <div class="w-full bg-black/5 p-1 text-center text-xs md:text-base">
            ©2024 All Rights Reserved : XDev 
        </div>
    </footer>

</body>
</html>
