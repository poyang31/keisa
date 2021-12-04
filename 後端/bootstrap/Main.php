<?php
require_once __DIR__ . '/../vendor/Router.php';
require_once __DIR__ . '/../vendor/DB.php';

class Main
{
    public static function run()
    {
        $conf = parse_ini_file(__DIR__ . '/../vendor/.env');
        Database::$dbHost = $conf['dbHost'];
        Database::$dbName = $conf['dbName'];
        Database::$dbUser = $conf['dbUser'];
        Database::$dbPassword = $conf['dbPassword'];

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "no_action";
        }

        //檢查帳密(以後說明)
        //判斷權限(以後說明)

        $router = new Router();
        require_once __DIR__ . "/../routes/web.php";
        $response = $router->run($action);

        echo json_encode($response);
    }
}
