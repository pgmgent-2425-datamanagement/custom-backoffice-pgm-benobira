<h1 class="text-3xl font-semibold text-gray-800 mb-6">Menus</h1>

<div class="max-w-2xl mb-6">
    <p class="text-gray-600">
        Manage the menu items available in your restaurant. Each menu entry displays the name, description, 
        price, and an image. You can add new menu items, edit existing ones, or delete those that are no longer needed.
    </p>
    <p class="text-amber-500 mt-2">
        Note: Deleting a menu will NOT delete the image from the system. To delete an image in the system, please go to the filemanager.
    </p>
</div>

<div class="mb-6 flex gap-4">
    <a href="/menus/add" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded inline-block">
        Add New Menu Item
    </a>
    <a href="/filemanager" class="bg-white border border-primary text-primary py-2 px-4 rounded hover:bg-gray-100 inline-block">
        Go To Filemanager
    </a>
</div>

<div class="mb-6">
    <form method="GET" action="/menus" class="flex flex-col sm:flex-row gap-2">
        <input 
            type="text" 
            name="search" 
            value="<?= $searchTerm ?? '' ?>" 
            placeholder="Search menus by name or description" 
            class="flex-grow px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"
        >

        <button type="submit" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded">Search</button>

        <a href="/menus" class="bg-white border border-primary text-primary text-center py-2 px-4 rounded hover:bg-gray-100 inline-block">
            Reset
        </a>
    </form>
</div>

<div class="overflow-x-auto border-x border-gray-200">
    <table class="whitespace-nowrap min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-primary uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Name</th>
                <th class="py-3 px-6 text-left">Description</th>
                <th class="py-3 px-6 text-left">Price (€)</th>
                <th class="py-3 px-6 text-left">Image</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach ($menus as $menu) {
                include 'menuRow.php';
            } ?>
        </tbody>
    </table>
</div>