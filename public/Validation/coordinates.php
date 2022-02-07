<?php


function validateFloatCoordinates(
    $latitude,
    $longitude,
    $left_down_latitude,
    $left_down_longitude,
    $right_up_latitude,
    $right_up_longitude,
    $min_value,
    $max_value
) {
    if (!filter_var($latitude, FILTER_VALIDATE_FLOAT)) {
        return "Error, type of latitude is wrong";
    }


    if (!filter_var($longitude, FILTER_VALIDATE_FLOAT)) {
        return "Error, type of longitude is wrong";
    }
    return "Type is ok";
}

function validateMinCoordinates(
    $latitude,
    $longitude,
    $left_down_latitude,
    $left_down_longitude,
    $right_up_latitude,
    $right_up_longitude,
    $min_value,
    $max_value
) {
    if (strlen($latitude) <= $min_value) {
        return "Error, very few symbols";
    }
    if (strlen($longitude) <= $min_value) {
        return "Error, very few symbols";
    }
    return "Min number of symbols is ok. ";
}

function validateMaxCoordinates(
    $latitude,
    $longitude,
    $left_down_latitude,
    $left_down_longitude,
    $right_up_latitude,
    $right_up_longitude,
    $min_value,
    $max_value
) {
    if (strlen($latitude) >= $max_value) {
        return "Error, a lot of symbols";
    }
    if (strlen($longitude) >= $max_value) {
        return "Error, a lot of symbols";
    }
    return "Max number of symbols is ok. ";
}

function validateSquaredCoordinates(
    $latitude,
    $longitude,
    $left_down_latitude,
    $left_down_longitude,
    $right_up_latitude,
    $right_up_longitude,
    $min_value,
    $max_value
) {
    if (!($longitude > $left_down_longitude && $latitude > $left_down_latitude && $longitude < $right_up_longitude && $latitude < $right_up_latitude)) {
        return "This coordinates not squared";
    }
    return "This coordinates squared";
}
function validateCoordinates($latitude, $longitude, $rules)
{
    $messages = [];
    $rules_in_array = explode('|', $rules);
    foreach ($rules_in_array as $rule) {
        if (stristr($rule, ':') !== FALSE) {
            $value = explode(':', $rule);
            array_push($messages, call_user_func_array("validate" . ucfirst($value[0]), [$latitude, $longitude, 30, 30, 80, 80, $value[1], $value[1]]));
        } else {
            array_push($messages, call_user_func_array("validate" . ucfirst($rule), [$latitude, $longitude, 30, 30, 80, 80, null, null]));
        }
    }
    return $messages;
}




function indexCoordinates($latitude, $longitude)
{

    $rules = 'floatCoordinates|minCoordinates:0|maxCoordinates:10|squaredCoordinates';
    $messages = validateCoordinates($latitude, $longitude, $rules);

    return count($messages)
        ? implode('</br>', $messages)
        : 'No validation messages';
}

