<?php
    ob_start();
    include '../app/Views/flow_pump.php';
    $content = ob_get_clean();
?>