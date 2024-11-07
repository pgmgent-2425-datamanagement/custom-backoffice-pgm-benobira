<h1 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h1>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Top 5 Most Popular Menus</h2>
        <div class="h-80">
            <canvas id="popularMenusChart"></canvas>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Reservation Statuses</h2>
        <div class="h-80">
            <canvas id="reservationStatusChart"></canvas>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
    <div class="bg-white shadow-md rounded-lg p-6 flex items-end justify-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Total Reservations</h2>
            <p class="text-primary text-2xl text-center"><?= $totalReservations ?></p>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 flex items-end justify-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Total Tables</h2>
            <p class="text-primary text-2xl text-center"><?= $totalTables ?></p>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 flex items-end justify-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Total Menus</h2>
            <p class="text-primary text-2xl text-center"><?= $totalMenus ?></p>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6 flex items-end justify-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-2 text-center">Total Users</h2>
            <p class="text-primary text-2xl text-center"><?= $totalUsers ?></p>
        </div>
    </div>
</div>

<div class="bg-white shadow-md rounded-lg p-6 mb-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Today's Reservations</h2>
    <?php if (!empty($todayReservations)): ?>
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-200 text-primary uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">User</th>
                    <th class="py-3 px-6 text-left">Time</th>
                    <th class="py-3 px-6 text-left">Guests</th>
                    <th class="py-3 px-6 text-left">Table</th>
                    <th class="py-3 px-6 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <?php foreach ($todayReservations as $reservation): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6"><?= $reservation['user_name'] ?></td>
                        <td class="py-3 px-6"><?= date('H:i', strtotime($reservation['reservation_time'])) ?></td>
                        <td class="py-3 px-6"><?= $reservation['guests'] ?></td>
                        <td class="py-3 px-6"><?= $reservation['table_number'] ?? 'N/A' ?></td>
                        <td class="py-3 px-6"><?= ucfirst($reservation['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-gray-600">No reservations for today.</p>
    <?php endif; ?>
</div>

<script>
    // Reservation Status Chart
    const reservationStatusCtx = document.getElementById('reservationStatusChart').getContext('2d');
    const reservationStatuses = <?= json_encode(array_keys($reservationStatusStats)) ?>;
    const reservationStatusCounts = <?= json_encode(array_values($reservationStatusStats)) ?>;

    const reservationStatusChart = new Chart(reservationStatusCtx, {
        type: 'doughnut',
        data: {
            labels: reservationStatuses,
            datasets: [{
                data: reservationStatusCounts,
                backgroundColor: [
                    'rgba(79, 70, 229, 0.75)',
                    'rgba(34, 197, 94, 0.75)',
                    'rgba(239, 68, 68, 0.75)'
                ],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                }
            }
        }
    });

    // Most Popular Menus Chart
    const popularMenusCtx = document.getElementById('popularMenusChart').getContext('2d');
    const popularMenuNames = <?= json_encode(array_column($popularMenus, 'name')) ?>;
    const popularMenuCounts = <?= json_encode(array_column($popularMenus, 'total_ordered')) ?>;

    const popularMenusChart = new Chart(popularMenusCtx, {
        type: 'bar',
        data: {
            labels: popularMenuNames,
            datasets: [{
                label: 'Total Ordered',
                data: popularMenuCounts,
                backgroundColor: 'rgba(79, 70, 229, 0.75)',
                borderColor: 'rgba(79, 70, 229, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Ordered'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Menu Items'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    enabled: true,
                }
            }
        }
    });
</script>