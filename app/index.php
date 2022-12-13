<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

require __DIR__ . "/kernel/forbidden.php";

$app = (require __DIR__ . "/kernel/app.php")();

$app->loadRoutes([
    "/" => "index",
    "/simple" => "simple"
]);

$app->start();
