<tr class="border-b border-gray-200 hover:bg-gray-100">
    <td class="py-3 px-6"><?= $reservation->user_name ?></td>
    <td class="py-3 px-6"><?= date('m/d/Y', strtotime($reservation->reservation_date)) ?></td>
    <td class="py-3 px-6"><?= date('H:i', strtotime($reservation->reservation_time)) ?></td>
    <td class="py-3 px-6"><?= $reservation->guests ?></td>
    <td class="py-3 px-6"><?= $reservation->table_number ?></td>
    <td class="py-3 px-6"><?= ucfirst($reservation->status) ?></td>
    <td class="py-3 px-6">
        <div class="flex space-x-4">
            <a href="/reservations/edit/<?= $reservation->id ?>" class="text-primary hover:text-indigo-950">View/Edit</a>
            <a href="/reservations/delete/<?= $reservation->id ?>" class="text-red-500 hover:text-red-700">Delete</a>
        </div>
    </td>
</tr>