<h1 class="text-3xl font-semibold text-gray-800 mb-6">Tables</h1>

<div class="max-w-2xl mb-6">
    <p class="text-gray-600">
        Here you can manage the tables available for reservations in your restaurant. 
        Each table entry displays the table number and the number of seats available. 
        You can add new tables, edit existing ones, or delete tables that are no longer needed.
    </p>
</div>

<div class="mb-6">
    <a href="/tables/add" class="bg-lightPrimary hover:bg-primary text-white py-2 px-4 rounded inline-block">
        Add New Table
    </a>
</div>

<div class="overflow-x-auto border-x border-gray-200">
    <table class="whitespace-nowrap min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-primary uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">Table Number</th>
                <th class="py-3 px-6 text-left">Amount of Seats</th>
                <th class="py-3 px-6 text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php foreach ($tables as $table) {
                include 'tableRow.php';
            } ?>
        </tbody>
    </table>
</div>

<div class="grid grid-cols-1 mt-6 bg-white shadow-md rounded-lg p-6">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Table Distribution</h2>
    <div class="max-w-2xl mb-6">
        <p class="text-gray-600">
            This chart shows the distribution of tables based on the number of seats they have. 
        </p>
    </div>
    <div class="h-96">
        <canvas id="tableChart"></canvas>
    </div>
</div>

<!-- Load the Chart.js library -->
<script>
    const ctx = document.getElementById('tableChart').getContext('2d');

    // Prepare the data
    const seatCounts = <?php 
        $seatCounts = [];
        foreach ($tables as $table) {
            $seatCounts[$table->seats] = ($seatCounts[$table->seats] ?? 0) + 1;
        }
        echo json_encode(array_keys($seatCounts)); 
    ?>;
    
    const tableCounts = <?php 
        echo json_encode(array_values($seatCounts)); 
    ?>;

    // Create the chart
    const tableChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: seatCounts, // Seat counts as labels
            datasets: [{
                label: 'Number of Tables',
                data: tableCounts, // Count of tables for each seat count
                backgroundColor: 'rgba(79, 70, 229, 0.75)', // Use your primary color with some transparency
                borderColor: 'rgba(79, 70, 229, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true, // Start the Y-axis at 0
                    title: {
                        display: true,
                        text: 'Number of Tables'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Amount of Seats'
                    }
                }
            },
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                }
            }
        }
    });
</script>