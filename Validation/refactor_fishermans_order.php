<?php
function validateString($fish_name, $fish_number = null, $min_value = null, $max_value = null, $available_fishes = null)
{
    if (!is_string($fish_name)) {
        return "ERROR 422, type of fish name have to be string.";
    }
    return "Type of fish name is ok.";
}
function validateInt($fish_name = null, $fish_number, $min_value = null, $max_value = null, $available_fishes = null)
{
    if (!is_int($fish_number)) {
        return "ERROR 422, type of fish number have to be int.";
    }
    return "Type of fish number is ok.";
}
function validateMin($fish_name, $fish_number = null, $min_value, $max_value = null, $available_fishes = null)
{
    if (strlen($fish_name) <= $min_value) {
        return "Very few characters in the name of the fish. ";
    }
    return "Min number of characters are ok. ";
}
function validateMax($fish_name, $fish_number = null, $min_value = null, $max_value, $available_fishes = null)
{
    if (strlen($fish_name) >= $max_value) {
        return "A lot of characters in the name of the fish. ";
    }
    return "Max number of characters are ok. ";
}
function validateInArray($fish_name, $fish_number = null, $min_value = null, $max_value = null, $available_fishes)
{
    if (!in_array($fish_name, $available_fishes)){
        return "This fish isn't listed. ";
    }
    return "This fish is listed. ";
}
function validate($fish_order, $fish_number, $rules, $available_fishes)
{
    $messages = [];
    $rules_in_arr = explode('|', $rules);
    foreach ($rules_in_arr as $rule) {
        if (stristr($rule, ':') !== FALSE) {
            $value = explode(':', $rule);
            array_push($messages, call_user_func_array("validate" . ucfirst($value[0]), [$fish_order, $fish_number, $value[1], $value[1],  $available_fishes]));
        } else {
            array_push($messages, call_user_func_array("validate" . ucfirst($rule), [$fish_order, $fish_number, null, null,  $available_fishes]));
        }
    }
    return $messages;
}
function index($fish_order, $fish_number)
{
    $available_fishes = [
        "Карась",
        "Окунь",
        "Лосось",
        "Форель"
    ];
    $rules = 'string|int|min:2|max:20|inArray:$available_fishes';
    $messages = validate($fish_order, $fish_number, $rules, $available_fishes);
    return count($messages)
        ? implode (',\n', $messages)
        : 'No validation message';
}
    $fish_order = readline("Input fish's name: ");
    $fish_number = readline("Input number of fishes: ");
    echo index($fish_order, $fish_number);