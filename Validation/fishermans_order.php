<?php

function validateString($fish_name)
{
    if((int) $fish_name != 0){
        return "ERROR 422, type of fish name have to be string. ";
    }
    return "Type of fish name is ok. ";
}
function validateInt($fish_number)
{
    if((int) $fish_number == 0){
        return "ERROR 422, type of fish number have to be int. ";
    }
    return "Type of fish number is ok. ";
}
function minMaxChecking(string $fish_name){
    $min = 3;
    $max = 15;
    if (strlen($fish_name) >= $max) {
        return "A lot of characters in the name of the fish. ";
    }
    if (strlen($fish_name) < $min) {
        return "Very few characters in the name of the fish. ";
    }
    return "Number of characters are ok. ";
}
function searchInList(string $fish_name, array $fishes){
    if(!in_array($fish_name, $fishes)){
        return "This fish isn't listed. ";
    }
    return "This fish is listed. ";
}
function orderFromFisherman(string $fish_name, string $fish_number)
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
    $type_checking_str = validateString($fish_name);
    $type_checking_int = validateInt($fish_number);
    $min_max_checking = minMaxChecking($fish_name);
    $search_in_list = searchInList($fish_name, $fishes);
    return "$type_checking_str $type_checking_int $min_max_checking $search_in_list";
} 
    $fish_name = readline("Input fish's name: ");
    $fish_number = readline("Input number of fishes: ");
    echo orderFromFisherman($fish_name, $fish_number);
 
