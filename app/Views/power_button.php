<?php
$powerBool = true;

function renderPowerButton($powerBool = true)
{
?>
    <div class="widget btn" id="powerButton">
        <i class="fa-solid fa-power-off" style="color: <?= $powerBool ? '#3be8b0' : '#fc636b'; ?>"></i>
    </div>
<?php
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const powerButton = document.getElementById('powerButton');
        const powerIcon = powerButton.querySelector('i');
        
        // Ensure the PHP value is correctly passed into JavaScript
        let powerState = <?php echo json_encode($powerBool); ?>;

        powerButton.addEventListener('click', function() {
            // Toggle the power state
            powerState = !powerState;

            // Update the button's color
            powerIcon.style.color = powerState ? '#3be8b0' : '#fc636b';

            // Optionally store the state for future reference (e.g., in localStorage)
            // localStorage.setItem('powerState', powerState);
        });

        powerButton.addEventListener('mouseenter', function() {
            powerIcon.style.filter = 'brightness(1.2)';
        });

        powerButton.addEventListener('mouseleave', function() {
            powerIcon.style.filter = 'brightness(1)';
        });
    });
</script>
