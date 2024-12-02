<?php
// Include the chart and gauge rendering functions
require_once '../app/Views/chart.php';
require_once '../app/Views/gauge.php';

$powerBool = true;

// Example data for charts and gauges
$charts = [
    [
        'title' => 'Water Flow Over 24h',
        'xAxisData' => ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'],
        'seriesData' => [
            'Flow in' => [30, 35, 40, 38, 42, 45, 50, 60, 70, 80, 85, 90, 95, 100, 105, 110, 115, 120, 125, 130, 135, 140, 145, 150],
            'Flow out' => [50, 55, 60, 45, 65, 70, 85, 90, 95, 100, 110, 115, 120, 125, 130, 135, 140, 145, 150, 155, 160, 165, 170, 175],
        ],
        'hasStep' => false,
        'color' => ['#3be8b0', '#fc636b'],
        'unit' => 'L/min'
    ],
    [
        'title' => 'Pump Over 24h',
        'xAxisData' => ['00:00', '01:00', '02:00', '03:00', '04:00', '05:00', '06:00', '07:00', '08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00', '20:00', '21:00', '22:00', '23:00'],
        'seriesData' => [
            'Pump' => [
                400,
                513.094,
                600,
                660.202,
                690,
                690.202,
                660,
                600,
                513.094,
                400,
                286.906,
                210,
                149.798,
                130,
                149.798,
                210,
                286.906,
                400,
                513.094,
                600,
                660.202,
                690,
                690.202,
                660
            ],
        ],
        'hasStep' => true,
        'color' => ['#1aafd0'],
        'unit' => 'L/min'
    ]
];

$gauges = [
    [
        'title' => 'Flow in',
        'value' => 150,
        'color' => '#3be8b0',
        'min' => 0,
        'max' => 250,
        'unit' => 'L/min'
    ],
    [
        'title' => 'Flow out',
        'value' => 175,
        'color' => '#fc636b',
        'min' => 0,
        'max' => 250,
        'unit' => 'L/min'
    ],
];
?>

<div class="flow_pump">
    <?php
    // Render each bar chart
    foreach ($charts as $index => $chart) {
        $chartId = 'Chart' . ($index + 1); // Unique ID for each chart
        try {
            renderChart($chartId, 'line', $chart['title'], $chart['xAxisData'], $chart['seriesData'], $chart['hasStep'], $chart['color'], $chart['unit']);
        } catch (Exception $e) {
            // Handle the error for chart rendering
            echo "<p>Error rendering chart '{$chart['title']}': " . $e->getMessage() . "</p>";
        }
    }

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
    if ($powerBool == true) {
    ?>
        <div class="widget btn">
            <i class="fa-solid fa-power-off" style="color: #3be8b0"></i>
        </div>
    <?php
    } else {
    ?>
        <div class="widget btn">
            <i class="fa-solid fa-power-off" style="color: #fc636b"></i>
        </div>
    <?php
    }
    ?>
</div>