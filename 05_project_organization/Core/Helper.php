<?php

namespace Core;

class Helper
{
    static function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }

    static function requestIs($url)
    {
        return $_SERVER["REQUEST_URI"] === $url;
    }

    static function abort($code = 404)
    {
        http_response_code($code);
        self::view("errors/{$code}.php");

        die();
    }

    static function authorize($condition, $status = Response::FORBIDDEN)
    {
        if (!$condition) {
            self::abort($status);
        }
    }

    static function base_path($path)
    {
        return BASE_PATH . $path;
    }

    static function view($path, $contents = [])
    {
        if ($path != "default") {
            extract($contents);
            require self::base_path("Views/$path");
        }
    }
}
