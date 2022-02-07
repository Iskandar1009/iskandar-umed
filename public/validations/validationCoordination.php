<?php

function validateFloatCoordinates(
    $shirota,
    $dolgota,
    $left_down_shirota,
    $left_down_dolgota,
    $right_up_shirota,
    $right_up_dolgota,
    $min_value,
    $max_value
) {
    if (!filter_var($shirota, FILTER_VALIDATE_FLOAT)) {
        return "Ошибка, тип широты неправильный";
    }


    if (!filter_var($dolgota, FILTER_VALIDATE_FLOAT)) {
        return "Ошибка, тип долготы неправильный";
    }
    return "Тип в порядке";
}
function validateMinCoordinates(
    $shirota,
    $dolgota,
    $left_down_shirota,
    $left_down_dolgota,
    $right_up_shirota,
    $right_up_dolgota,
    $min_value,
    $max_value
) {
    if (strlen($shirota) <= $min_value) {
        return "Ошибка, очень мало символов";
    }
    if (strlen($dolgota) <= $min_value) {
        return "Ошибка, очень мало символов";
    }
    return "Минимальное количество символов в порядке.";
}
function validateMaxCoordinates(
    $shirota,
    $dolgota,
    $left_down_shirota,
    $left_down_dolgota,
    $right_up_shirota,
    $right_up_dolgota,
    $min_value,
    $max_value
) {
    if (strlen($shirota) >= $max_value) {
        return "Ошибка, много символов";
    }
    if (strlen($dolgota) >= $max_value) {
        return "Ошибка, много символов";
    }
    return "Максимальное количество символов в порядке. ";
}
function validateSquaredCoordinates(
    $shirota,
    $dolgota,
    $left_down_shirota,
    $left_down_dolgota,
    $right_up_shirota,
    $right_up_dolgota,
    $min_value,
    $max_value
) {
    if (!($dolgota > $left_down_dolgota && $shirota > $left_down_shirota && $dolgota < $right_up_dolgota && $shirota < $right_up_shirota)) {
        return "Это координаты Не в квадрате";
    }
    return "Это координаты в квадрате";
}
function validateCoordinates($shirota, $dolgota, $rules)
{
    $messages = [];
    $rules_in_array = explode('|', $rules);
    foreach ($rules_in_array as $rule) {
        if (stristr($rule, ':') !== FALSE) {
            $value = explode(':', $rule);
            array_push($messages, call_user_func_array("validate" . ucfirst($value[0]), [$shirota, $dolgota, 100, 100, 880, 880, $value[1], $value[1]]));
        } else {
            array_push($messages, call_user_func_array("validate" . ucfirst($rule), [$shirota, $dolgota, 100, 100, 800, 800, null, null]));
        }
    }
    return $messages;
}
function indexCoordinates($shirota, $dolgota)
{

    $rules = 'floatCoordinates|minCoordinates:0|maxCoordinates:10|squaredCoordinates';
    $messages = validateCoordinates($shirota, $dolgota, $rules);

    return count($messages)
        ? implode('</br>', $messages)
        : 'No validation messages';
}