<?php

require_once __DIR__ . "/../../vendor/Database.php";

class Employee extends DB
{
    public function getUsers()
    {
        Database::connect();
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $sql = "SELECT  *  FROM  `employees` WHERE `id`=?";
            $arg = array($id);
        } else {
            $sql = "SELECT  *  FROM  `employees`";
            $arg = null;
        }
        return Database::select($sql, $arg);
    }

    public function newUser()
    {
        $name = $_POST["name"];
        $password = $_POST["password"];
        $workdate = $_POST["workdate"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        Database::connect();
        $sql = "INSERT INTO `employees` (`name`, `password`, `workdate`, `address`, `email`, `phone`) VALUES (?, ?, ?, ?, ?, ?)";
        return Database::insert($sql, array($name, $password, $workdate, $address, $email, $phone));
    }

    public function removeUser()
    {
        $id = $_POST["id"];

        Database::connect();
        $sql = "DELETE FROM `employees` WHERE `id` = ?";
        return Database::delete($sql, array($id));
    }

    public function updateUser()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $password = $_POST["password"];
        $workdate = $_POST["workdate"];
        $address = $_POST["address"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        Database::connect();
        $sql = "UPDATE `employees` SET `name` = ?, `password` = ?, `workdate` = ?, `address` = ?, `email` = ?, `phone` = ? WHERE `id`=?";
        return Database::update($sql, array($name, $password, $workdate, $address, $email, $phone, $id));
    }
}
