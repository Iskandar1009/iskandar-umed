<?php
require 'validations/validationFisherman.php';
require 'validations/validationCoordination.php';

$fish_name = $_POST['fish_name'];
$fish_number = $_POST['fish_number'];

$shirota = $_POST['shirota'];
$dolgota = $_POST['dolgota'];


$validation_fishes = index($fish_name, $fish_number);
$validation_coordinates = indexCoordinates($shirota, $dolgota);

echo "Заказ: $fish_name, </br> Количество: $fish_number, </br> $validation_fishes </br>";
echo "Широта: $shirota, </br> Долгота: $dolgota, </br> $validation_coordinates";
