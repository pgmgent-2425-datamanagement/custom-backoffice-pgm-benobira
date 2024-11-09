<h1 class="text-3xl font-semibold text-gray-800 mb-6">Add Reservation</h1>

<form method="POST" action="/reservations/add" class="bg-white shadow-md rounded-lg p-6">
    <div class="mb-4">
        <label for="user_id" class="block text-gray-700 font-medium mb-2">Select User</label>
        <select id="user_id" name="user_id" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="">-- Select User --</option>
            <?php foreach ($users as $user): ?>
                <option value="<?= $user->id ?>"><?= $user->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label for="reservation_date" class="block text-gray-700 font-medium mb-2">Reservation Date</label>
        <input type="date" id="reservation_date" name="reservation_date" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
    </div>

    <div class="mb-4">
        <label for="reservation_time" class="block text-gray-700 font-medium mb-2">Reservation Time</label>
        <input type="time" id="reservation_time" name="reservation_time" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
    </div>

    <div class="mb-4">
        <label for="guests" class="block text-gray-700 font-medium mb-2">Number of Guests</label>
        <input type="number" id="guests" name="guests" min="1" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
    </div>

    <div class="mb-4">
        <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
        <select id="status" name="status" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="pending">Pending</option>
            <option value="accepted">Accepted</option>
            <option value="cancelled">Cancelled</option>
        </select>
    </div>

    <div class="mb-4">
        <label for="table_id" class="block text-gray-700 font-medium mb-2">Select Table</label>
        <select id="table_id" name="table_id" required
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
            <option value="">-- Select Table --</option>
            <?php foreach ($tables as $table): ?>
                <option value="<?= $table->id ?>">
                    Table <?= $table->table_number ?> (Seats: <?= $table->seats ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-2">Select Menus</label>
        <?php foreach ($menus as $menu): ?>
            <div class="flex items-center gap-4 mb-2">
                <input type="checkbox" id="menu_<?= $menu->id ?>" name="menus[<?= $menu->id ?>][selected]" value="1">
                <input type="number" name="menus[<?= $menu->id ?>][amount]" min="1" placeholder="Amount"
                    class="w-28 px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary">
                <label for="menu_<?= $menu->id ?>" class="text-gray-700"><?= htmlspecialchars($menu->name) ?></label>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="mb-4">
        <label for="comment" class="block text-gray-700 font-medium mb-2">Comment</label>
        <textarea id="comment" name="comment" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
    </div>

    <div class="flex items-center justify-between mt-6">
        <a href="/reservations" class="text-gray-500 hover:text-gray-700">Back</a>
        <input type="submit" value="Add Reservation"
            class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded-md cursor-pointer">
    </div>
</form>