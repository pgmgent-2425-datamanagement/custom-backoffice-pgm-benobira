<form method="POST" class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <label for="table_number" class="block text-gray-700 font-medium mb-2">Table Number</label>
        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="table_number" name="table_number" value="<?= $table->table_number; ?>">
    </div>

    <div class="mb-4">
        <label for="seats" class="block text-gray-700 font-medium mb-2">Amount of Seats</label>
        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" id="seats" name="seats" value="<?= $table->seats; ?>">
    </div>

    <div class="flex items-center justify-between mt-6">
        <a href="/tables" class="text-gray-500 hover:text-gray-700">Back</a>
        <input type="submit" value="Save" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 cursor-pointer">
    </div>
</form>