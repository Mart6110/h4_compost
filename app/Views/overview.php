<?php
// Include the gauge chart rendering function
require_once '../app/Views/gauge.php';

$powerBool = true;

// Example data for the 5 gauge charts
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
        'value' => 70,
        'color' => '#1aafd0',
        'min' => 0,
        'max' => 100,
        'unit' => '°C'
    ],
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
<div class="overview">
    <?php
    // Render each gauge chart with try-catch for error handling
    foreach ($gauges as $index => $gauge) {
        $gaugeId = 'gaugeChart' . ($index + 1); // Unique ID for each chart
        try {
            renderGaugeChart($gaugeId, $gauge['title'], [['value' => $gauge['value'],]], $gauge['color'], $gauge['min'], $gauge['max'], $gauge['unit']);
        } catch (Exception $e) {
            // Handle the error (e.g., log it or show a message)
            echo "<p>Error rendering gauge chart for '{$gauge['title']}': " . $e->getMessage() . "</p>";
        }
    }
    ?>
    <div class="widget btn" id="powerButton">
        <i class="fa-solid fa-power-off" style="color: <?= $powerBool ? '#3be8b0' : '#fc636b'; ?>"></i>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const powerButton = document.getElementById('powerButton');
        const powerIcon = powerButton.querySelector('i');
        let powerState = <?= json_encode($powerBool); ?>; // Initial state from PHP

        powerButton.addEventListener('click', function() {
            // Toggle the power state
            powerState = !powerState;

            // Update the button's color
            powerIcon.style.color = powerState ? '#3be8b0' : '#fc636b';
        });
    });
</script>