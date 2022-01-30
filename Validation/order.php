<?php

function validateString($item)
{
    if(!is_string($item)){
        return "ERROR 422, type of order have to be string. ";
    }
    return "Type of order is ok. ";
}
function validateMin($item, $min_value){
    if (strlen($item) < $min_value) {
        return "Very few characters in the order. ";
    }
    return "Min number of characters are ok. ";
}
function validateMax($item, $max_value){
    if (strlen($item) >= $max_value) {
        return "A lot of characters in the order. ";
    }
    
    return "Max number of characters are ok. ";
}
function validateInArray($order, $orders){
    if(!in_array($order, $orders)){
        return "This order isn't listed. ";
    }
    return "This order is listed. ";
}
function order($order){
    $orders = ["Рифы", "Земля", "Тонем"];
    $validate_string = validateString($order);
    $validate_min = validateMin($order, 2);
    $validate_max = validateMax($order, 15);
    $validate_in_array = validateInArray($order, $orders);
    $result = ['message' => "$validate_string $validate_min $validate_max $validate_in_array"];
    return $result['message'];
    
}
$order = readline("Input order: ");
echo order($order);
