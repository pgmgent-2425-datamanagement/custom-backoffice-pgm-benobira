<h1 class="text-3xl font-semibold text-gray-800 mb-6">Add File</h1>

<form method="POST" action="/filemanager/add/<?= $currentPath ?>" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <label for="file_path" class="block text-gray-700 font-medium mb-2">Upload New File</label>
        <input type="file" id="file_path" name="file_path" accept="image/*"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
    </div>

    <div class="flex items-center justify-between mt-6">
        <a href="/filemanager/<?= $currentPath ?>" class="text-gray-500 hover:text-gray-700">Back</a>
        <input type="submit" value="Add File" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded-md cursor-pointer">
    </div>
</form>