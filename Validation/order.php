<?php

function validateString($item)
{
    if (!is_string($item)) {
        return "ERROR 422, type of order have to be string. ";
    }
    return "Type of order is ok. ";
}
function validateMin($item, $min_value)
{
    if (strlen($item) <= $min_value) {
        return "Very few characters in the order. ";
    }
    return "Min number of characters are ok. ";
}
function validateMax($item, $max_value)
{
    if (strlen($item) >= $max_value) {
        return "A lot of characters in the order. ";
    }

    return "Max number of characters are ok. ";
}
function validateInArray($order, $orders)
{
    if (!in_array($order, $orders)) {
        return "This order isn't listed. ";
    }
    return "This order is listed. ";
}
function order($order)
{
    $validation_message = "";
    $validation_message .= validateString($order) . '</br>';
    $validation_message .= validateMin($order, 2) . '</br>';
    $validation_message .= validateMax($order, 15) . '</br>';
    $orders =
        [
            "Рифы",
            "Земля",
            "Тонем"
        ];
    $validation_message .= validateInArray($order, $orders) . '</br>';
    return $validation_message;
}
$order = readline("Input order: ");
echo order($order);
