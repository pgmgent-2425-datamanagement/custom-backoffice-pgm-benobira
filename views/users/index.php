<h1 class="text-3xl font-semibold text-gray-800 mb-6">Users</h1>

<div class="max-w-2xl mb-6">
    <p class="text-gray-600">
        Manage the users of your application here. You can view, edit, or delete users as needed. 
        Each user has an associated email and name, making it easy to keep track of your application's user base.
    </p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($users as $user) {
        include 'userItem.php';
    } ?>
</div>