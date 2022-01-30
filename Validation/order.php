<?php

function validateString($order)
{
    if((int) $order != 0){
        return "ERROR 422, type of order have to be string. ";
    }
    return "Type of order is ok. ";
}
function minMaxChecking(string $order){
    $min = 2;
    $max = 15;
    if (strlen($order) >= $max) {
        return "A lot of characters in the order. ";
    }
    if (strlen($order) < $min) {
        return "Very few characters in the order. ";
    }
    return "Number of characters are ok. ";
}
function searchInList(string $order, array $orders){
    for($i = 0; $i <= 3; $i++){
        if($order == $orders[$i]){
            return "This order is on your order list.";
        }
    }
    return "This order is not in your list of orders.";
}
function order(string $order){
    //CODE BY ISKANDAR
    $orders = ["Рифы", "Земля", "Тонем"];
    $type_checking_str = validateString($order);
    $min_max_checking = minMaxChecking($order);
    $search_in_list = searchInList($order, $orders);
    return "$type_checking_str $min_max_checking $search_in_list";
    
}
$order = readline("Input order: ");
echo order($order);
