<?php

require_once __DIR__ . "/../vendor/Router.php";
require_once __DIR__ . "/../vendor/Database.php";

class Main
{
    public static function run()
    {
        $conf = parse_ini_file("./.env");
        Database::$dbHost = $conf["DB_HOST"];
        Database::$dbName = $conf["DB_NAME"];
        Database::$dbUser = $conf["DB_USER"];
        Database::$dbPassword = $conf["DB_PASS"];

        if (isset($_GET["action"])) {
            $action = $_GET["action"];
        } else {
            $action = "_no_action";
        }

        $router = new Router();
        require_once __DIR__ . "/../routes/web.php";
        $response = $router->run($action);

        echo json_encode($response);
    }
}
