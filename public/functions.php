<?php
require 'Validation/refactored-order.php';
require '../index.php';
require 'Validation/coordinates.php';

$order = $_POST['order'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$validation_order = indexOrder($order);
$validation_coordinates = indexCoordinates($latitude, $longitude);

echo "<h2>Order:</h2> </br> $validation_order </br> <h2>Coordinates:</h2> </br> $validation_coordinates";   