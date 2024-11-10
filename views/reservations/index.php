<h1 class="text-3xl font-semibold text-gray-800 mb-6">Reservations</h1>

<div class="max-w-2xl mb-6">
    <p class="text-gray-600">
        Manage reservations in your restaurant. Each reservation displays the user, date, time, number of guests, and status.
        You can view details, edit, or delete reservations as needed.
    </p>
</div>

<div class="mb-6 flex gap-4">
    <a href="/reservations/add" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded inline-block">
        Add New Reservation
    </a>
</div>

<div class="mb-6">
    <form method="GET" action="/reservations" class="flex flex-col sm:flex-row gap-2">
        <select name="user_id" class="px-4 py-2 border border-gray-300 rounded-md">
            <option value="">All Users</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user->id ?>" <?= ($selectedUserId == $user->id) ? 'selected' : '' ?>>
                    <?= $user->name ?>
                </option>
            <?php endforeach; ?>
        </select>

        <input type="date" name="reservation_date" value="<?= $selectedDate ?? '' ?>"
            class="px-4 py-2 border border-gray-300 rounded-md">

        <select name="status" class="px-4 py-2 border border-gray-300 rounded-md">
            <option value="">All Statuses</option>
            <option value="pending" <?= ($selectedStatus == 'pending') ? 'selected' : '' ?>>Pending</option>
            <option value="accepted" <?= ($selectedStatus == 'accepted') ? 'selected' : '' ?>>Accepted</option>
            <option value="cancelled" <?= ($selectedStatus == 'cancelled') ? 'selected' : '' ?>>Cancelled</option>
        </select>

        <button type="submit" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded">Filter</button>

        <a href="/reservations" class="bg-white border border-primary text-primary text-center py-2 px-4 rounded hover:bg-gray-100 inline-block">
            Reset
        </a>
    </form>
</div>

<div class="overflow-x-auto border-x border-gray-200">
    <table class="whitespace-nowrap min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-primary uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">User</th>
                <th class="py-3 px-6 text-left">Date</th>
                <th class="py-3 px-6 text-left">Time</th>
                <th class="py-3 px-6 text-left">Guests</th>
                <th class="py-3 px-6 text-left">Table</th>
                <th class="py-3 px-6 text-left">Status</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach ($reservations as $reservation) {
                include 'reservationRow.php';
            } ?>
        </tbody>
    </table>
</div>