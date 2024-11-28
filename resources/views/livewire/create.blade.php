<div>
    <div class="mb-4">
        <form>
            <!-- Email Input -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input
                    type="email"
                    id="email"
                    class="mt-1 block w-full px-4 py-2 border @error('email') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter Email"
                    wire:model="email">
                @error('email')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Telephone Number Input -->
            <div class="mb-4">
                <label for="telephone_number" class="block text-sm font-medium text-gray-700">Telephone Number:</label>
                <input
                    type="text"
                    id="telephone_number"
                    class="mt-1 block w-full px-4 py-2 border @error('telephone_number') border-red-500 @else border-gray-300 @enderror rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Enter Telephone Number"
                    wire:model="telephone_number">
                @error('telephone_number')
                <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="grid grid-cols-2 gap-4">
                <button
                    wire:click.prevent="storeTest()"
                    class="w-full bg-green-500 text-white py-2 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">
                    Save
                </button>
                <button
                    wire:click.prevent="cancelTest()"
                    class="w-full bg-gray-500 text-white py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-400">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
