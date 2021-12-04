<?php
require_once './Router.php';
require_once './Database.php';

$conf =  parse_ini_file('./.env');
Database::$dbHost = $conf['DatabaseHost'];
Database::$dbName = $conf['DatabaseName'];
Database::$dbUser = $conf['DatabaseUser'];
Database::$dbPassword = $conf['DatabasePassword'];

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = "no_action";

$router = new Router();
$router->register('TwoRectArea', 'Controller', 'getTwoArea');
$router->register('getUsers', 'Employee', 'getUsers');
$router->register('newUser', 'Employee', 'newUser');
$router->register('removeUser', 'Employee', 'removeUser');
$router->register('updateUser', 'Employee', 'updateUser');

$response = $router->run($action);

echo json_encode($response);
