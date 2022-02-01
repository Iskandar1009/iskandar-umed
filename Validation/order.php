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
 function validateInArray($order, $available_orders)
 {
     if (!in_array($order, $available_orders)) {
         return "This order isn't listed. ";
     }
     return "This order is listed. ";
 }
 function validate($order, $rules, $available_orders)
 {
     $messages = [];
     $rules_in_array = explode('|', $rules);
     if(in_array('string', $rules_in_array)){
         array_push($messages, validateString($order));
     }
     if(in_array('min', $rules_in_array)){
         array_push($messages, validateMin($order, 2));
     }
     if(in_array('max', $rules_in_array)){
         array_push($messages, validateMax($order, 40));
     }
     if(in_array('in:available_orders', $rules_in_array)){
         array_push($messages, validateInArray($order, $available_orders));
     }
     return $messages;
 }
 function index($order)
 {
     $available_orders =
         [
             "Рифы",
             "Земля",
             "Тонем"
         ];
     $rules = 'string|min|max|in:available_orders';
     $messages = validate($order, $rules, $available_orders);

     return count($messages)
         ? implode(',\n', $messages)
         :'No validation messages';
 }
 $order = readline("Input order: ");
 echo index($order);