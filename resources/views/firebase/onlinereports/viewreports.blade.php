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

<body class="flex flex-col min-h-screen">
    <header class="flex items-center justify-between bg-white border-b border-gray-200 px-6 py-4 shadow-md">
        <h1 class="text-2xl font-bold text-gray-800">Ez Health</h1>
        <form action="{{ route('logoutuser') }}" method="POST" class="inline-block">
            @csrf
            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </header>

    <main class="flex-grow p-6 rounded-lg">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Reports</h2>
            
            @if($matchedReports && count($matchedReports) > 0)
                <table class="min-w-full bg-white border border-gray-300 rounded-lg">
                    <thead>
                        <tr class="bg-red-600 text-white uppercase text-sm">
                   
                            <th class="py-3 px-6 text-left">Patient Name</th>
                            <th class="py-3 px-6 text-left">CNIC</th>
                            <th class="py-3 px-6 text-left">Date</th>
                            <th class="py-3 px-6 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matchedReports as $report)
                            <tr class="border-b border-gray-300 hover:bg-gray-100">
                               
                                <td class="py-3 px-6">{{ $report['user_report_patient_name'] }}</td>
                                <td class="py-3 px-6">{{ $report['user_report_cnic'] }}</td>
                                <td class="py-3 px-6">{{ $report['user_report_date'] }}</td>
                                <td class="py-3 px-6 text-center">
                                    <a href="{{ url('report/details/' . $report['report_key']) }}" 
                                       class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                                       <i class="fas fa-file-alt mr-2"></i> Complete Report
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-600">No matching reports found.</p>
            @endif
        </div>
    </main>

    <!-- Footer with sticky positioning -->
    <footer class="bg-black text-white border-t border-gray-200 text-center p-4 mt-auto">
        <p class="text-white">© 2024 Ez Health | <a href="{{route('ownership')}}" class="text-red-600 hover:underline"> Project Ownership</a></p>
    </footer>
</body>

</html>
