<h1 class="text-3xl font-semibold text-gray-800 mb-6">Users</h1>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($users as $user) {
        include 'userItem.php';
    } ?>
</div>