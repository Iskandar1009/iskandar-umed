<?php

function validateString($fish_name)
{
    if (!is_string($fish_name)) {
        return "ERROR 422, type of fish name have to be string. ";
    }
    return "Type of fish name is ok. ";
}
function validateInt($fish_number)
{
    if (!is_int($fish_number)) {
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
function validateInArray($fish_name, $available_fishes)
{
    if (!in_array($fish_name, $available_fishes)){
        return "This fish isn't listed. ";
    }
    return "This fish is listed. ";
}
function validateFishes($fish_name, $rules, $fish_number, $available_fishes)
{
    $messages = [];
    $rules_in_array = explode('|', $rules);
    if (in_array('string', $rules_in_array)){
        array_push($messages, validateString($fish_name));
    }
    if (in_array('int', $rules_in_array)){
        array_push($messages, validateInt($fish_number));
    }
    if (in_array('min', $rules_in_array)){
        array_push($messages, validateMin($fish_name, 2));
    }
    if (in_array('max', $rules_in_array)){
        array_push($messages, validateMax($fish_name, 15));
    }
    if (in_array('in:available_fishes', $rules_in_array)){
        array_push($messages, validateInArray($fish_name, $available_fishes));
    }
    return $messages;
}
function index($fish_name, $fish_number)
{
    $available_fishes = [
        "Окунь",
        "Карась",
        "Сазан",
        "Лосось"
    ];
    $rules = 'string|int|min|max|in:available_fishes';
    $messages = validateFishes($fish_name, $rules, $fish_number, $available_fishes);
    
    return count($messages)
    ? implode(',\n', $messages)
    : 'No validation messages';
}
    $fish_name = readline("Input fish's name: ");
    $fish_number = readline("Input number of fishes: ");
    echo index($fish_name, $fish_number);