<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

require __DIR__ . "/forbidden.php";
require __DIR__ . "/router.php";

final class Engine {
    private Router $router;

    public function loadRoutes(array $routes) {
        foreach ($routes as $method => $path) {
            $this->router->set($path, $method);
        }
    }

    public function run() {
        
    }
}

return function() {
    return new Engine();
};
