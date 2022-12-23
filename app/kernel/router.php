<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

final class Router
{
    private array $routes;

    public function get(string $path): callable
    {
        return $this->routes[$path];
    }

    public function set(string $prefix_path, array $pack): void
    {
        foreach ($pack as $suffix_path => $method) {
            $trigger_path = join("/", array_map(
                fn ($s) => trim($s, "/"),
                [$prefix_path, $suffix_path]
            ));
            $this->routes[$trigger_path] = $method;
        }
    }
}
