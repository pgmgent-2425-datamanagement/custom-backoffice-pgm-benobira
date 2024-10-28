<h1 class="text-3xl font-semibold text-gray-800 mb-6">Filemanager</h1>

<div class="max-w-2xl mb-6">
    <p class="text-gray-600">
        Manage the files available in your system. You can upload new files, view existing ones, or delete those that are no longer needed.
    </p>
</div>

<div class="mb-6 flex gap-4">
    <a href="/filemanager/add/<?= $currentPath ?>" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded inline-block">
        Add New File in <?= $currentPath ? $currentPath : 'root' ?>
    </a>
</div>

<div>
    <div class="mb-4 p-4 bg-gray-100 rounded-lg shadow-sm flex justify-between items-center">
        <p class="text-gray-700">
            You are in: <strong><?= $currentPath ? $currentPath : 'root' ?></strong>
        </p>
        <?php if ($currentPath) : ?>
            <a href="/filemanager/<?= dirname($currentPath) !== '.' ? dirname($currentPath) : '' ?>" class="text-primary hover:underline mt-2 inline-block">
                &larr; Go back
            </a>
        <?php endif; ?>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach ($files as $file) { ?>
            <?php if ($file != '.' && $file != '..') : ?>
                <?php
                    $isDir = is_dir(BASE_DIR . '/public/uploads/' . $currentPath . '/' . $file);
                    include 'fileItem.php';
                ?>
            <?php endif; ?>
        <?php } ?>
    </div>
</div>