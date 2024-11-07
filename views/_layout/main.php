<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' | ' . $_ENV['SITE_NAME'] ?></title>
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Import the main tailwindcss file -->
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
    <!-- Import Alpine.js and Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- Import the favicon -->
    <link rel="icon" href="/icons/favicon.svg" type="image/x-icon">
</head>
<body class="font-poppins bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar for large screens -->
        <?php include __DIR__ . '/../partials/sidebar.php'; ?>

        <!-- Mobile Menu for small screens -->
        <?php include __DIR__ . '/../partials/mobileMenu.php'; ?>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <?= $content; ?>
        </main>

        <!-- Back to Top Button -->
        <a href="#" class="fixed bottom-6 right-6 bg-lightPrimary text-white p-3 rounded-full shadow-lg hover:bg-primary transition">
            <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414L10 1.586l6.707 6.707a1 1 0 01-1.414 1.414L11 5.414V18a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
            </svg>
        </a>
    </div>
</body>
</html>