<?php
ob_start();
include '../app/Views/overview.php';
$content = ob_get_clean();
?>