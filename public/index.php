<?php
// include necessary configuration and helper files
require_once '../config/app.php';

// Basic routing
$page = $_GET['page'] ?? 'overview';

// Start output buffering to capture the content for the page
ob_start();

switch ($page) {
  case 'temperature':
    $pageTitle = 'Temperature';
    include '../app/Controllers/TemperatureController.php';
    break;
  case 'flow_pump':
    $pageTitle = 'Flow & Pump';
    include '../app/Controllers/FlowPumpController.php';
    break;
  case 'overview':
  default:
    $pageTitle = 'Overview';
    include '../app/Controllers/HomeController.php';
    break;
}

// Now include the layout with the dynamic content
include '../app/Views/layout.php';
