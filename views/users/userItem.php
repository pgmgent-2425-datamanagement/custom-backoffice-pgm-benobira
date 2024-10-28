<div class="bg-white shadow-md rounded-lg p-6 flex flex-col justify-between">
    <div>
        <div class="text-lg font-semibold text-gray-700"><?= $user->name ?></div>
        <div class="text-sm text-gray-500"><?= $user->email ?></div>
    </div>
    <?php if ($user->name !== 'Admin'): ?>
        <div class="mt-4 flex space-x-4">
            <a href="/users/edit/<?= $user->id ?>" class="text-primary hover:text-indigo-950">Edit</a>
            <a href="/users/delete/<?= $user->id ?>" class="text-red-500 hover:text-red-700">Delete</a>
        </div>
    <?php else: ?>
        <div class="mt-4 text-gray-400 text-sm">
            You cannot edit/delete the Admin user.
        </div>
    <?php endif; ?>
</div>