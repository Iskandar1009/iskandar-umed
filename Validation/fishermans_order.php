<?php

function validateString($fish_name)
{
    if(!is_string($fish_name)){
        return "ERROR 422, type of fish name have to be string. ";
    }
    return "Type of fish name is ok. ";
}
function validateInt($fish_number)
{
    if(!is_int($fish_number)){
        return "ERROR 422, type of fish number have to be int. ";
    }
    return "Type of fish number is ok. ";
}
function validateMin($fish_name, $min_value)
{
    if (strlen($fish_name) <= $min_value) {
        return "Very few characters in the name of the fish. ";
    }
    return "Number of characters are ok. ";
}
function validateMax($fish_name, $max_value)
{
    if (strlen($fish_name) >= $max_value) {
        return "A lot of characters in the name of the fish. ";
    }
    return "Number of characters are ok. ";
}
function validateInArray(string $fish_name, array $fishes)
{
    if(!in_array($fish_name, $fishes)){
        return "This fish isn't listed. ";
    }
    return "This fish is listed. ";
}
function orderFishes(string $fish_name, string $fish_number)
{
    //проверить типы данных
    //длина команды минимум и максимум
    //находится для в наборе уже существующих рыб в океане
    $fishes = [
        "Окунь",
        "Карась",
        "Сазан",
        "Лосось"
    ];

    $validate_string = validateString($fish_name) . '</br>';
    $validate_int = validateInt($fish_number) . '</br>';
    $validate_min = validateMin($fish_name, 2) . '</br>';
    $validate_max = validateMax($fish_name, 15). '</br>';
    $validate_in_array = validateInArray($fish_name, $fishes) . '</br>';
    return "$validate_string $validate_int $validate_min $validate_max $validate_in_array";
} 
    $fish_name = readline("Input fish's name: ");
    $fish_number = readline("Input number of fishes: ");
    echo orderFishes($fish_name, $fish_number);
