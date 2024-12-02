<?php
// Include the chart and gauge rendering functions
require_once '../app/Views/chart.php';
require_once '../app/Views/gauge.php';

// Example data for multiple charts and gauges
$Charts = [
    [
        'title' => 'Temperature Over 24h',
        'xAxisData' => ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'],
        'seriesData' => [
            'Temperature in' => [20, 22, 25, 28, 31, 35, 39, 43, 47, 51, 55, 58, 62, 66, 69, 71, 72, 73, 73, 71, 68, 64, 62, 60],
            'Temperature out' => [21, 24, 28, 32, 37, 42, 47, 52, 57, 61, 64, 67, 70, 73, 75, 77, 78, 79, 79, 77, 75, 72, 70, 68],
            'Compost Temperature' => [30, 35, 40, 45, 50, 55, 58, 60, 63, 65, 67, 68, 69, 70, 71, 72, 73, 74, 75, 75, 75, 75, 75, 75],
        ],
        'hasStep' => false,
        'color' => ['#3be8b0', '#fc636b', '#1aafd0'],
        'unit' => '°C'
    ]
];

$gauges = [
    [
        'title' => 'Temperature in',
        'value' => 60,
        'color' => '#3be8b0',
        'min' => 0,
        'max' => 100,
        'unit' => '°C'
    ],
    [
        'title' => 'Temperature out',
        'value' => 68,
        'color' => '#fc636b',
        'min' => 0,
        'max' => 100,
        'unit' => '°C'
    ],
    [
        'title' => 'Compost Temperature',
        'value' => 75,
        'color' => '#1aafd0',
        'min' => 0,
        'max' => 100,
        'unit' => '°C'
    ],
];
?>

<div class="temperature">
    <?php
    // Render the bar chart (spans two rows)
    foreach ($Charts as $index => $chart) {
        $chartId = 'barChart' . ($index + 1); // Unique ID for each chart
        try {
            renderChart($chartId, 'line', $chart['title'], $chart['xAxisData'], $chart['seriesData'], $chart['hasStep'], $chart['color'], $chart['unit']);
        } catch (Exception $e) {
            // Handle the error for chart rendering
            echo "<p>Error rendering chart '{$chart['title']}': " . $e->getMessage() . "</p>";
        }
    }
    ?>

    <?php
    // Render each gauge chart dynamically
    foreach ($gauges as $index => $gauge) {
        $gaugeId = 'gaugeChart' . ($index + 1); // Unique ID for each gauge
        try {
            renderGaugeChart($gaugeId, $gauge['title'], [['value' => $gauge['value'],]], $gauge['color'], $gauge['min'], $gauge['max'], $gauge['unit']);
        } catch (Exception $e) {
            // Handle the error for gauge rendering
            echo "<p>Error rendering gauge '{$gauge['title']}': " . $e->getMessage() . "</p>";
        }
    }
    ?>
</div>
