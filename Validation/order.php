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
 function validateArray($order, $min_value, $max_value, $available_orders)
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
     $rules_in_array_without_colon = explode(':', $rules);
     //unset();
     foreach($rules_in_array as $rule){
         array_push($messages, call_user_func_array("validate" . ucfirst($rule), [$order, 2, 12,  $available_orders]));
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
     $rules = 'string|min:2|max:12|in:&available_orders';
     $messages = validate($order, $rules, $available_orders);
    
     return count($messages)
         ? implode(',\n', $messages)
         :'No validation messages';
 }
 $order = readline("Input order: ");
 echo index($order);