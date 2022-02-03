<?php

function validateString($fish_name, $min_value, $max_value, $fish_number, $available_fishes)
{
    if (!is_string($fish_name)) {
        return "ERROR 422, type of fish name have to be string. ";
    }
    return "Type of fish name is ok. ";
}
function validateInt($fish_name, $min_value, $max_value, $fish_number, $available_fishes)
{
    if (!is_int($fish_number)) {
        return "ERROR 422, type of fish number have to be int. ";
    }
    return "Type of fish number is ok. ";
}
function validateMin($fish_name, $min_value, $max_value, $fish_number, $available_fishes)
{
    if (strlen($fish_name) <= $min_value) {
        return "Very few characters in the name of the fish. ";
    }
    return "Min number of characters are ok. ";
}
function validateMax($fish_name, $min_value, $max_value, $fish_number, $available_fishes)
{
    if (strlen($fish_name) >= $max_value) {
        return "A lot of characters in the name of the fish. ";
    }
    return "Max number of characters are ok. ";
}
function validateInArray($fish_name, $min_value, $max_value, $fish_number, $available_fishes)
{
    if (!in_array($fish_name, $available_fishes)){
        return "This fish isn't listed. ";
    }
    return "This fish is listed. ";
}
function validateFishes($fish_name, $rules, $fish_number, $available_fishes, $rules_values)
{
    $messages = [];
    $rules_in_array = explode('|', $rules);
    $rules_values_in_array = explode('|', $rules_values);

    foreach ($rules_in_array as $rule) {
        array_push($messages, call_user_func_array("validate" . ucfirst($rule), [$fish_name, $rules_values_in_array[0], $rules_values_in_array[1], $fish_number, $available_fishes]));
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
    $rules = 'string|int|min|max|inArray';
    $rules_values = '2|15';
    $messages = validateFishes($fish_name, $rules, $fish_number, $available_fishes, $rules_values);
    
    return count($messages)
        ? implode(',\n', $messages)
        : 'No validation messages';
}
    $fish_name = readline("Input fish's name: ");
    $fish_number = readline("Input number of fishes: ");
    echo index($fish_name, $fish_number);