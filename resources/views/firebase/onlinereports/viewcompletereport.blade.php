<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ez Health | User</title>
    <link rel="icon" href="{{ asset('assets/Browserpicture.svg') }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen bg-gray-100">
    <header class="flex items-center justify-between bg-white border-b border-gray-200 px-6 py-4 shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">Ez Health</h1>
        <form action="{{ route('logoutuser') }}" method="POST" class="inline-block">
            @csrf
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </header>

    <main class="flex-grow flex items-center justify-center p-6">
        <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
            <h2 class="text-3xl font-bold text-gray-700 mb-6 text-center">Report Details</h2>

            <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-user-injured text-blue-500 mr-2"></i> Patient Information
                </h3>
                <div class="space-y-3 text-gray-700">
                    <p class="mb-3">
                        <i class="fas fa-id-badge text-green-500 mr-2"></i><strong>Patient Name:</strong> 
                        {{ $report['user_report_patient_name'] ?? 'NA' }}
                    </p>
                    <p class="mb-3">
                        <i class="fas fa-address-card text-orange-500 mr-2"></i><strong>CNIC:</strong> 
                        {{ $report['user_report_cnic'] ?? 'NA' }}
                    </p>
                    <p class="mb-3">
                        <i class="fas fa-calendar-day text-yellow-500 mr-2"></i><strong>Date:</strong> 
                        {{ $report['user_report_date'] ?? 'NA' }}
                    </p>
                    <p class="mb-4">
                        <i class="fas fa-clock text-purple-500 mr-2"></i><strong>Time:</strong> 
                        {{ $report['user_report_time'] ?? 'NA' }}
                    </p>
                </div>

                @if(isset($report['user_report_url']) && $report['user_report_url'])
                    <h3 class="text-xl font-bold text-gray-800 mt-6 text-center">
                        <i class="fas fa-file-image text-red-500 mr-2"></i> Report Image
                    </h3>
                    <div class="flex justify-center mt-4">
                        <img src="{{ $report['user_report_url'] }}" alt="Report Image" class="w-72 h-80 rounded-md shadow-lg">
                    </div>

                    <div class="mt-6 text-center">
                        <a href="{{ $report['user_report_url'] }}" download="{{ $report['user_report_patient_name'] }}_report.jpg" 
                           class="inline-block px-6 py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            <i class="fas fa-download mr-2"></i> Download Report
                        </a>
                    </div>
                @else
                    <p class="text-gray-600 mt-4 text-center">No image available for this report.</p>
                @endif
            </div>
        </div>
    </main>

    <footer class="bg-black text-white border-t border-gray-200 text-center p-4 mt-auto">
        <p class="text-white">
            © 2024 Ez Health | <a href="{{route('ownership')}}" class="text-red-600 hover:underline"><i class="fas fa-cogs mr-2"></i> Project Ownership</a>
        </p>
    </footer>
</body>

</html>
