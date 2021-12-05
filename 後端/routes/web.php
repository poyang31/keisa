<?php

require_once __DIR__ . "/../vendor/Database.php";

assert(isset($router) && $router instanceof Router);

$router->register("getUsers", "Employee", "getUsers");
$router->register("newUser", "Employee", "newUser");
$router->register("removeUser", "Employee", "removeUser");
$router->register("updateUser", "Employee", "updateUser");

$router->register("getProducts", "Product", "getProducts");
$router->register("newProduct", "Product", "newProduct");
$router->register("removeProduct", "Product", "removeProduct");
$router->register("updateProduct", "Product", "updateProduct");

$router->register("getDepts", "Dept", "getDepts");
$router->register("newDept", "Dept", "newDept");
$router->register("removeDept", "Dept", "removeDept");
$router->register("updateDept", "Dept", "updateDept");

$router->register("getSuppliers", "Supplier", "getSuppliers");
$router->register("newSupplier", "Supplier", "newSupplier");
$router->register("removeSupplier", "Supplier", "removeSupplier");
$router->register("updateSupplier", "Supplier", "updateSupplier");
