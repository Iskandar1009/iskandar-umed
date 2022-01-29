<?php

function typeChecking($str){
    //CODE BY ISKANDAR
    if((int) $str == 0){
        return "Variable's type is true. ";
    }
    return "ERROR, invalid type of variable. ";
}
function order(string $order){
    //CODE BY ISKANDAR
    $orders = ["Рифы", "Земля", "Тонем"];
    if(strlen($order) > 15 || strlen($order) < 2){
        return "ERROR, your order is long or short.";
    }
    for($i = 0; $i <= 3; $i++){
        if($order == $orders[$i]){
            return "This order is on your order list.";
        }
    }
    return "This order is not in your list of orders.";
}
$order = readline("Input order: ");
echo typeChecking($order);
echo order($order);
