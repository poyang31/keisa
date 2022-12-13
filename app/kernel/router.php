<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

final class Router
{
    public function get(string $path): callable
    {
        return fn() => null;
    }

    public function set(string $path, callable $method): void
    {

    }
}
