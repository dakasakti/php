<?php

namespace Core;

class Validator
{
    public static function required($value)
    {
        $value = trim($value);
        return strlen($value) > 0;
    }

    public static function min($value, $min = 1)
    {
        $value = trim($value);
        return strlen($value) >= $min;
    }

    public static function max($value, $max = INF)
    {
        $value = trim($value);
        return strlen($value) <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
