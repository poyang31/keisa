<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

$app = (require __DIR__ . "/kernel/app.php")();

$app->loadRoutes([
    "/" => "index",
    "/sample" => "sample"
]);

$app->start();
