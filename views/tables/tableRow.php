<tr class="border-b border-gray-200 hover:bg-gray-100">
    <td class="py-3 px-6"><?= $table->table_number ?></td>
    <td class="py-3 px-6"><?= $table->seats ?></td>
    <td class="py-3 px-6">
        <div class="flex space-x-4">
            <a href="/tables/edit/<?= $table->id ?>" class="text-primary hover:text-indigo-950">Edit</a>
            <a href="/tables/delete/<?= $table->id ?>" class="text-red-500 hover:text-red-700">Delete</a>
        </div>
    </td>
</tr>