<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

require_once __DIR__ . "/engine.php";

return function () {
    $config = file_exists(__DIR__ . "/variables.php")
        ? require __DIR__ . "/variables.php"
        : array();
    return new Engine($config);
};
