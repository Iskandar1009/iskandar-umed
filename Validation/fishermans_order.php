<?php

function typeChecking($str, $int)
{
    if((int) $str == 0 && (int) $int != 0){
        return "Variable's type is true. ";
    }
    return "ERROR, invalid type of variable. ";
}

function orderFromFisherman(string $fish_name, string $fish_number)
{
    //проверить типы данных
    //длина команды минимум и максимум
    //находится для в наборе уже существующих рыб в океане
    $new_fish_number = (int) $fish_number;
    $fishes = [
        "Окунь",
        "Карась",
        "Сазан",
        "Лосось"
    ];

    if (strlen($fish_name) >= 15) {
        return "A lot of characters in the name of the fish";
    }
    if (strlen($fish_name) < 3) {
        return "Very few characters in the name of the fish";
    }
    if ($fishes[0] == $fish_name){
        return "This fish is on the list";
    }
    if ($fishes[1] == $fish_name){
        return "This fish is on the list";
    }
    if ($fishes[2] == $fish_name){
        return "This fish is on the list";
    }
    if ($fishes[3] == $fish_name){
        return "This fish is on the list";
    } else {
        return "ERROR - 422!Change your order!";
    }
} 
    $fish_name = readline("Input fish's name: ");
    $fish_number = readline("Input number of fishes: ");
    echo typeChecking($fish_name, $fish_number);
    echo orderFromFisherman($fish_name, $fish_number);
 
