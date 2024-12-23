<h1 class="text-3xl font-semibold text-gray-800 mb-6">Add Table</h1>

<form method="POST" class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <label for="table_number" class="block text-gray-700 font-medium mb-2">Table Number</label>
        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="table_number" name="table_number" placeholder="Enter table number">
    </div>

    <div class="mb-4">
        <label for="seats" class="block text-gray-700 font-medium mb-2">Amount of Seats</label>
        <input type="number" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary" id="seats" name="seats" placeholder="Enter amount of seats">
    </div>

    <div class="flex items-center justify-between mt-6">
        <a href="/tables" class="text-gray-500 hover:text-gray-700">Back</a>
        <input type="submit" value="Add Table" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded-md  cursor-pointer">
    </div>
</form>