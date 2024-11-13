@extends('firebase.layouts.main')

@section('content')
   <div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <!-- Title and Button in the Same Line -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">View All Tests</h1>

        <!-- Add New Test Button -->
        <a href="{{ route('add_test') }}">
            <button class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition transform hover:scale-105 duration-300">
                <span class="flex items-center">
                    <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 4v16m8-8H4"></path>
                    </svg>
                    Add New Test
                </span>
            </button>
        </a>
    </div>

    <!-- Status Message -->
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6 text-center" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <!-- Tests Table -->
    @if (!empty($tests))
        <div class="overflow-x-auto rounded-md">
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-red-600 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left font-semibold">Test Name</th>
                        <th class="py-3 px-6 text-left font-semibold">Test Price</th>
                        <th class="py-3 px-6 text-center font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    @foreach ($tests as $testKey => $test)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition duration-200">
                            <td class="py-3 px-6 text-left">{{ $test['test_name'] }}</td>
                            <td class="py-3 px-6 text-left">Rs. {{ $test['test_price'] }}</td>
                            <td class="py-3 px-6 text-center">
                                <a href="{{ route('view_test', ['id' => $testKey]) }}" class="inline-flex items-center bg-blue-500 hover:bg-blue-700 text-white font-semibold py-1 px-3 rounded-md shadow-md transition duration-300 text-sm">
                                  
                                    View More
                                    <!-- Right Arrow Icon -->
                                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M10 6l6 6-6 6"></path>
                                    </svg>
                                </a>
                                
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <!-- No Tests Available Message -->
        <div class="text-center text-gray-600 mt-6">
            <p>No tests available at the moment.</p>
        </div>
    @endif
</div>


     
@endsection
