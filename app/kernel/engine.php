<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

require __DIR__ . "/router.php";
require __DIR__ . "/context.php";

final class Engine
{
    public Router $router;
    public Context $context;

    public function __construct(array $config)
    {
        $this->router = new Router();
        $this->context = new Context();
        $this->context->set("config", $config);
    }

    public function loadRoutes(array $routes): void
    {
        foreach ($routes as $method => $path) {
            $this->router->set($path, $method);
        }
    }

    public function start(): void
    {
        if (!isset($_GET["action"])) return;
        $path = $_SERVER["HTTP_X_KEISA_PATH"];
        $method = $this->rounter->get($path);
        if (!is_callable($method)) return;
        call_user_func($method, $this->context);
    }
}
