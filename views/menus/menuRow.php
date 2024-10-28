<tr class="border-b border-gray-200 hover:bg-gray-100">
    <td class="py-3 px-6"><?= $menu->name ?></td>
    <td class="py-3 px-6">
        <span class="block md:hidden"><?= substr($menu->description, 0, 10) ?>...</span>
        <span class="hidden md:block"><?= $menu->description ?></span>
    </td>
    <td class="py-3 px-6"><?= $menu->price ?></td>
    <td class="py-3 px-6">
        <?php if ($menu->file_path): ?>
            <img src="/uploads/menus/<?= $menu->file_path ?>" alt="<?= $menu->name ?>" class="w-16 h-16 rounded-md object-cover">
        <?php else: ?>
            <span class="text-gray-400 italic">No image</span>
        <?php endif; ?>
    </td>
    <td class="py-3 px-6">
        <div class="flex space-x-4">
            <a href="/menus/edit/<?= $menu->id ?>" class="text-primary hover:text-indigo-950">Edit</a>
            <a href="/menus/delete/<?= $menu->id ?>" class="text-red-500 hover:text-red-700">Delete</a>
        </div>
    </td>
</tr>