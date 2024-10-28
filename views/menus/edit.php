<h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Menu Item</h1>

<form method="POST" action="/menus/edit/<?= $menu->id ?>" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
        <input type="text" id="name" name="name" value="<?= $menu->name; ?>"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
        <textarea id="description" name="description"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"><?= $menu->description; ?></textarea>
    </div>

    <div class="mb-4">
        <label for="price" class="block text-gray-700 font-medium mb-2">Price (€)</label>
        <input type="number" step="0.01" id="price" name="price" value="<?= $menu->price; ?>"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
    </div>

    <div class="mb-4">
        <label for="existing_image" class="block text-gray-700 font-medium mb-2">Choose Existing Image</label>
        <select id="existing_image" name="existing_image" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="">-- Select an existing image --</option>
            <?php
            $images = glob(BASE_DIR . '/public/uploads/menus/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
            foreach ($images as $image) {
                $filename = basename($image);
                $selected = ($filename == $menu->file_path) ? 'selected' : '';
                echo "<option value=\"$filename\" $selected>$filename</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-4">
        <label for="file_path" class="block text-gray-700 font-medium mb-2">Upload New Image</label>
        <input type="file" id="file_path" name="file_path" accept="image/*"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
    </div>

    <p class="text-gray-500 mt-4 pb-2">Current Image:</p>
    <?php if ($menu->file_path): ?>
        <img src="/uploads/menus/<?= $menu->file_path ?>" alt="<?= $menu->name ?>" class="w-64 h-64 rounded-md object-cover">
    <?php else: ?>
        <p class="text-gray-500">No image available</p>
    <?php endif; ?>
    <p class="text-gray-500 text-sm mt-2"><?= $menu->file_path ?></p>

    <div class="flex items-center justify-between mt-6">
        <a href="/menus" class="text-gray-500 hover:text-gray-700">Back</a>
        <input type="submit" value="Save" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded-md cursor-pointer">
    </div>
</form>