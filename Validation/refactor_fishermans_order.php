<?php

function validateString($fish_name)
{
    if (is_string($fish_name)) {
        return "Type of fish name is ok. ";
    }
    return "ERROR 422, type of fish name have to be string. ";
}
function validateInt($fish_number)
{
    if (is_int($fish_number)) {
        return "Type of fish number is ok. ";
    }
    return "ERROR 422, type of fish number have to be int. ";
}
function validateMin($fish_name, $min_value)
{
    if (strlen($fish_name) <= $min_value) {
        return "Very few characters in the name of the fish. ";
    }
    return "Min number of characters are ok. ";
}
function validateMax($fish_name, $max_value)
{
    if (strlen($fish_name) >= $max_value) {
        return "A lot of characters in the name of the fish. ";
    }
    return "Max number of characters are ok. ";
}
function validateInArray($fish_name, $available_fishes)
{
    if (in_array($fish_name, $available_fishes)){
        return "This fish is listed. ";
    }
    return "This fish isn't listed. ";
}
function validate($fish_name, $rules, $fish_number, $available_fishes)
{
    $messages = [];
    $rules_in_array = explode('|', $rules);
    array_push($messages, call_user_func_array("validate", [$fish_name, $rules_in_array[2], $rules_in_array[3],  $available_fishes]));
    return $messages;
}
function index($fish_name, $fish_number)
{
    $available_fishes = [
        "Карась",
        "Окунь",
        "Лосось",
        "Форель"
    ];
    $rules = 'string|int|min:2|max:20|in:$available_fishes';
    $messages = validate($fish_name, $rules, $available_fishes);

    return count($messages)
        ? implode (',\n', $messages)
        : 'No validation message';
}
    $fish_name = readline("Input fish's name: ");
    $fish_number = readline("Input number of fishes: ");
    echo index($fish_name, $fish_number);