<?php
    ob_start();
    include '../app/Views/temperature.php';
    $content = ob_get_clean();
?>
