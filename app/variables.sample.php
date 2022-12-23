<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

return [
    "APP_NAME" => "keisa"
];
