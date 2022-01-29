<?php
//CODE BY ISKANDAR
function typeChecking($str){
    if(is_string($str) == 1){
        return "Order's type is OK. ";
    }
    return "ERROR, invalid type of order. ";
}
function order(string $order){
    $orders = ["Рифы", "Земля", "Тонем"];
    if(strlen($order) > 15 || strlen($order) < 2){
        return "ERROR, your order is long or short.";
    }
    for($i = 0; $i <= 4; $i++){
        if($order == $orders[$i]){
            return "This order is on your order list.";
        }
    }
    return "This order is not in your list of orders.";
}
$order = readline("Input order: ");
echo typeChecking($order);
echo order($order);
