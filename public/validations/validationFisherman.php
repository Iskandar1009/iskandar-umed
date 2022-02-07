<?php

function validateString($fish_name, $fish_number, $min_value, $max_value, $available_fishes)
{
    if (!is_string($fish_name)) {
        return "Тип название рыбы должен быть строковый. Ошибка 422!";
    }
    return "С типом названии рыбы ВСЁ ХОРОШО!";
}
function validateInt($fish_name, $fish_number, $min_value, $max_value, $available_fishes) 
{
    if (!is_int($fish_number)) {
        return "Тип количество рыбы должен быть числовой. Ошибка 422!";
    }
    return "С типом количество рыбы ВСЁ ХОРОШО!";
}
function validateMin($fish_name, $fish_number, $min_value, $max_value, $available_fishes)
{
    if (strlen($fish_name) <= $min_value) {
        return "Символов в названии рыбы меньше Минимума!";
    }
    return "Минимальное количество символов в порядке ";
}
function validateMax($fish_name, $fish_number, $min_value, $max_value, $available_fishes) 
{
    if (strlen($fish_name) >= $max_value) {
        return "Символов в названии рыбы больше Максимума!";
    }
    return "Максимальное количество символов в порядке ";
}
function validateInArray($fish_name, $fish_number, $min_value, $max_value, $available_fishes)
{
    if (in_array($fish_name, $available_fishes)) {
        return "Эта рыба в списке!";
    }
    return "Эта рыба НЕ в списке!";
}
function validateFishes($fish_name, $fish_number, $rules, $available_fishes)
{
    $messages = [];
    $rules_in_arr = explode('|', $rules);
    foreach ($rules_in_arr as $rule) {
        if (stristr($rule, ':') !== FALSE) {
            $value = explode(':', $rule);
            array_push($messages, call_user_func_array("validate" . ucfirst($value[0]), [$fish_name, $fish_number, $value[1], $value[1], $available_fishes]));
        } 
    }
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

    $rules = 'string|int|min:2|max:20|inArray:$available_fishes';

    $messages = validateFishes($fish_name, $fish_number, $rules, $available_fishes);

    return count($messages)
        ? implode ('</br>', $messages)
        : 'No validation message';
}
