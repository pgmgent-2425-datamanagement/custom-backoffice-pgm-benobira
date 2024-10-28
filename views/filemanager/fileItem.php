<?php if ($isDir) : ?>
    <a href="/filemanager/<?= $currentPath . '/' . $file ?>" class="bg-white shadow-md rounded-lg p-4 block hover:border hover:border-lightPrimary">
        <div class="text-center">
            <img src="/icons/folder.svg" alt="<?= $file ?>" class="mx-auto h-32">
        </div>
        <div class="mt-8 text-center">
            <p class="text-gray-800 text-sm"><?= $file ?></p>
        </div>
    </a>
<?php else : ?>
    <div class="bg-white shadow-md rounded-lg p-4 relative">
        <div class="absolute top-3 right-3 h-6 w-6 bg-red-500 hover:bg-red-700 rounded-full flex justify-center items-center">
            <a href="/filemanager/delete/<?= $currentPath . '/' . $file ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="h-full w-full p-1">
                    <path d="M18.36 6.64a1 1 0 0 0-1.41 0L12 11.59 7.05 6.64a1 1 0 0 0-1.41 1.41L10.59 13l-5.95 5.95a1 1 0 1 0 1.41 1.41L12 14.41l4.95 4.95a1 1 0 0 0 1.41-1.41L13.41 13l5.95-5.95a1 1 0 0 0 0-1.41z"/>
                </svg>
            </a>
        </div>
        <div class="absolute top-3 left-3 h-6 w-6 bg-lightPrimary hover:bg-primary rounded-full flex justify-center items-center">
            <a href="/uploads/<?= $currentPath . '/' . $file ?>" download>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="h-full w-full p-1">
                    <path d="M12 16a1 1 0 0 0 .71-.29l5-5a1 1 0 0 0-1.42-1.42L13 12.59V3a1 1 0 0 0-2 0v9.59L7.71 9.29a1 1 0 0 0-1.42 1.42l5 5A1 1 0 0 0 12 16z"/>
                    <path d="M19 18H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2z"/>
                </svg>
            </a>
        </div>
        <div class="text-center">
            <img src="/uploads/<?= $currentPath . '/' . $file ?>" alt="<?= $file ?>" class="mx-auto h-32 rounded-md">
        </div>
        <div class="mt-8 text-center">
            <p class="text-gray-800 text-sm"><?= $file ?></p>
        </div>
    </div>
<?php endif; ?>