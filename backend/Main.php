<?php

require_once './Router.php';
require_once './DB.php';

class Main{
    static function run(){
        $conf = parse_ini_file('./.env');
        DB::$dbHost = $conf['dbHost'];
        DB::$dbName = $conf['dbName'];
        DB::$dbUser = $conf['dbUser'];
        DB::$dbPassword = $conf['dbPassword'];

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
        } else {
            $action = "_no_action";
        }

        $router = new Router();
        //$router->register('TwoRectArea', 'Controller', 'getTwoArea');
        require_once './Web.php';
        $response = $router->run($action);

        echo json_encode($response);
    }
}
