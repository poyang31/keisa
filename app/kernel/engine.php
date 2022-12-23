<?php
// Keisa is the easiest PHP framework
// (c) 2022 Po-Yang (https://tinyurl.com/poyang31)

if (__FILE__ === $_SERVER["SCRIPT_FILENAME"]) {
    require __DIR__ . "/forbidden.php";
    exit;
}

require_once __DIR__ . "/router.php";
require_once __DIR__ . "/context.php";
require_once __DIR__ . "/request.php";
require_once __DIR__ . "/response.php";

final class Engine
{
    public Router $router;
    public Context $context;

    public function __construct(array $config)
    {
        $this->context = new Context();
        $this->router = new Router();
        $this->context->set("config", $config);
        $this->context->set("action", $this->readAction());
        $this->context->set("request", new Request($this->context));
        $this->context->set("response", new Response($this->context));
    }

    private function readAction(): string
    {
        if (!isset($_GET["_action"])) {
            echo "_action is empty";
            exit;
        }
        $action = $_GET["_action"];
        unset($_GET["_action"]);
        return $action;
    }

    public function loadRoutes(array $routes): void
    {
        foreach ($routes as $prefix_path => $pack_name) {
            $pack_filename = __DIR__ . "/../routes/r_$pack_name.php";
            $pack = (require $pack_filename);
            $this->router->set($prefix_path, $pack);
        }
    }

    public function start(): void
    {
        $action = $this->context->get("action");
        $method = $this->router->get($action);
        if (!is_callable($method)) {
            echo "_action not found";
            exit;
        }
        call_user_func($method, $this->context);
    }
}
