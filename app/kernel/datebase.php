<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

require __DIR__ . "/forbidden.php";

return function(array $context) {
    $context["database"] = new PDO();
};
