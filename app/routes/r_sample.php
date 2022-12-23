<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

require_once __DIR__ . "/../kernel/context.php";

$indexHandler = function (Context $context): void {
    $context->get("response")->json([
        "name" => $context->get("config")["APP_NAME"]
    ]);
};

return [
    "/" => $indexHandler,
];
