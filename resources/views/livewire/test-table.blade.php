<div class="container mx-auto p-4">
    <div class="mb-6">
        <!-- Success Message -->
        @if(session()->has('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded-md mb-4">
                {{ session()->get('message') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session()->has('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
                {{ session()->get('error') }}
            </div>
        @endif
    </div>

    <!-- Add Button -->
    @if(!$add_test)
        <div class="flex justify-end mb-4">
            <button wire:click="addTest()"
                    class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Add New Test
            </button>
        </div>
    @endif

    <!-- Tests Table -->
    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
            <tr>
                <th class="py-3 px-6 border-b">Email</th>
                <th class="py-3 px-6 border-b">Telephone Number</th>
                <th class="py-3 px-6 border-b">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if (count($tests) > 0)
                @foreach ($tests as $test)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-6 border-b">{{ $test->email }}</td>
                        <td class="py-2 px-6 border-b">{{ $test->telephone_number }}</td>
                        <td class="py-2 px-6 border-b">
                            <!-- Edit Button -->
                            <button wire:click="editTest({{ $test->id }})"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded mr-2">
                                View
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="py-4 px-6 text-center text-gray-500">
                        No Tests Found.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

    <!-- Create Modal -->
    @if($add_test)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                @include('livewire.create')
                <button wire:click="$set('add_test', false)"
                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    ✕
                </button>
            </div>
        </div>
    @endif

    <!-- Update Modal -->
    @if($update_test)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 z-50">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                @include('livewire.update')
                <button wire:click="$set('update_test', false)"
                        class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                    ✕
                </button>
            </div>
        </div>
    @endif
</div>

