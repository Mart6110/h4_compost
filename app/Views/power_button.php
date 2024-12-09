<?php
$powerBool = true;

function renderPowerButton($powerBool = true)
{
?>
    <div class="widget" id="powerButton">
        <h1>Pump power switch</h1>
        <div class="switch-container standby">
            <button id="OFF" class="<?= !$powerBool ? 'active' : '' ?>">OFF</button>
            <button id="ON" class="<?= !$powerBool ? 'active' : '' ?>">ON</button>
        </div>
    </div>
<?php
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const powerButton = document.getElementById('powerButton');
        const offButton = document.getElementById('OFF');
        const onButton = document.getElementById('ON');

        // Ensure the PHP value is passed into JavaScript
        let powerState = <?php echo json_encode($powerBool); ?>;

        // Update the button state based on the power state
        function updatePowerState() {
            offButton.classList.toggle('active', !powerState);
            onButton.classList.toggle('active', powerState);
        }

        // Event listener for OFF button
        offButton.addEventListener('click', function() {
            powerState = false;
            updatePowerState();
        });

        // Event listener for ON button
        onButton.addEventListener('click', function() {
            powerState = true;
            updatePowerState();
        });

        // Initial power state update
        updatePowerState();
    });
</script>