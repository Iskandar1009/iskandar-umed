<?php

function validateString($item, $min_value, $max_value, $available_orders)
{
    if (!is_string($item)) {
        return "ERROR 422, type of order have to be string. ";
    }
    return "Type of order is ok. ";
}
function validateMin($item, $min_value, $max_value, $available_orders)
{
    if (strlen($item) <= $min_value) {
        return "Very few characters in the order. ";
    }
    return "Min number of characters are ok. ";
}
function validateMax($item, $min_value, $max_value, $available_orders)
{
    if (strlen($item) >= $max_value) {
        return "A lot of characters in the order. ";
    }

    return "Max number of characters are ok. ";
}
function validateInArray($order, $min_value, $max_value, $available_orders)
{
    if (!in_array($order, $available_orders)) {
        return "This order isn't listed. ";
    }
    return "This order is listed. ";
}
function validateOrder($order, $rules, $available_orders)
{
    $messages = [];
    $rules_in_array = explode('|', $rules);
    foreach ($rules_in_array as $rule) {
        if (stristr($rule, ':') !== FALSE) {
            $value = explode(':', $rule);
            array_push($messages, call_user_func_array("validate" . ucfirst($value[0]), [$order, $value[1], $value[1],  $available_orders]));
        } else {
            array_push($messages, call_user_func_array("validate" . ucfirst($rule), [$order, null, null, $available_orders]));
        }
    }
    return $messages;
}
function indexOrder($order)
{
    $available_orders =
        [
            "Рифы",
            "Земля",
            "Тонем"
        ];
    $rules = 'string|min:2|max:25|inArray:$available_orders';
    $messages = validateOrder($order, $rules, $available_orders);

    return count($messages)
        ? implode('</br>', $messages)
        : 'No validation messages';
}
