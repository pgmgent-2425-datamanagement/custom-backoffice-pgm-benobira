<form method="POST" class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="name" name="name" value="<?= $user->name; ?>">
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="email" name="email" value="<?= $user->email; ?>">
    </div>

    <div class="flex items-center justify-between mt-6">
        <a href="/users" class="text-gray-500 hover:text-gray-700">Back</a>
        <input type="submit" value="Save" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 cursor-pointer">
    </div>
</form>