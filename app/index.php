<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

require __DIR__ . "/kernel/forbidden.php";

$engine = (require __DIR__ . "/kernel/engine.php")();

$engine->loadRoutes([
    "/" => "index",
    "/simple" => "simple"
]);

$engine->run();
