@extends('firebase.layouts.main')
@section('content')

<div class="container mx-auto mt-1">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">View Admins</h1>

    @if (session('status'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
        <span class="block sm:inline">{{ strtoupper(session('status')) }}</span>
    </div>
@endif


    <!-- Admins Table -->
    <div class="m-4">
        <div class="w-full overflow-hidden rounded-lg shadow-md bg-white">
            <div class="w-full overflow-x-auto">
                <h5 class="mb-3 text-lg font-semibold text-gray-900 text-center">
                    Total Admins: {{ $totaladmins }}
                </h5>
                <table class="w-full whitespace-no-wrap">
                    <thead class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b bg-red-600">
                        <tr>
                            <th class="px-4 py-3">Role</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach($admins as $key => $admin)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <img src="https://img.icons8.com/windows/32/dc2626/user-male-circle.png" 
                                        class="w-8 h-8 mr-3 rounded-full" alt="Profile picture" />
                                    <div>
                                        <p class="font-semibold text-gray-900">{{ $admin['admin_role'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $admin['admin_email'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">{{ $admin['admin_email'] }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2">
                                    <!-- Edit Button -->
                                    <a href="{{ url('editadmin/' . $key) }}" class="flex items-center">
                                        <button class="flex items-center px-2 py-1 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-150">
                                            <i class="fas fa-edit mr-2"></i> Edit
                                        </button>
                                    </a>
                                    
                                    <!-- Delete Button with Confirmation Modal Trigger -->
                                    <button type="button" onclick="showDeleteModal('{{ url('deleteadmin/' . $key) }}')"
                                        class="flex items-center px-2 py-1 text-sm font-medium text-white bg-red-600 rounded-md hover:bg-red-700 transition duration-150">
                                        <i class="fas fa-trash-alt mr-2"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm">
      <h2 class="text-lg font-semibold text-gray-900 mb-4">Confirm Deletion</h2>
      <p class="text-gray-600 mb-6">Are you sure you want to delete this admin?</p>
      <div class="flex justify-end space-x-4">
          <!-- Cancel Button with Font Awesome Cross Icon -->
          <button onclick="hideDeleteModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-150">
              <i class="fas fa-times mr-2"></i> Cancel
          </button>
          <!-- Confirm Delete Button with Font Awesome Trash Icon -->
          <a id="confirmDeleteLink" href="#">
              <button class="px-4 py-2 text-red-700 rounded-md hover:bg-red-700 hover:text-white transition duration-150">
                  <i class="fas fa-trash-alt mr-2"></i> Delete
              </button>
          </a>
      </div>
  </div>
</div>


<script>
    // Show the delete confirmation modal
    function showDeleteModal(deleteUrl) {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('confirmDeleteLink').setAttribute('href', deleteUrl);
    }

    // Hide the delete confirmation modal
    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

@endsection
