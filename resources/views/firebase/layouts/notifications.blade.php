@extends('firebase.layouts.main')

@section('content')
<div class="container mx-auto  p-2">
    <div class="bg-white shadow-lg rounded-lg p-4">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Notifications</h1>

        <ul class="space-y-4">
            @forelse ($notifications as $notification)
                <li class="p-4 bg-gray-50 border-l-4 border-blue-500 rounded-lg shadow-sm transition transform hover:scale-105 hover:shadow-md">
                    <div class="flex items-center justify-between">
                        <span class="font-semibold text-blue-600 text-lg">{{ $notification['table'] }} Notification</span>
                        <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($notification['timestamp'])->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-700 mt-2">{{ $notification['message'] }}</p>
                </li>
            @empty
                <li class="text-center text-gray-500 font-medium text-lg">No new notifications.</li>
            @endforelse
        </ul>
    </div>
</div>

<!-- AJAX script to mark notifications as read -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        fetch("{{ url('/notifications/mark-as-read') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({})
        }).then(response => response.json())
          .then(data => console.log(data));
    });
</script>
@endsection
