<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' | ' . $_ENV['SITE_NAME'] ?></title>
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="font-poppins bg-gray-50">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <?php include __DIR__ . '/../partials/sidebar.php'; ?>

        <!-- Main Content -->
        <main class="flex-1 p-10">
            <?= $content; ?>
        </main>
    </div>
</body>
</html>