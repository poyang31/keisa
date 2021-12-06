<?php

require_once __DIR__ . "/../../vendor/Database.php";

class Employee extends Controller
{
    public function getUsers()
    {
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $sql = "SELECT  *  FROM  `employees` WHERE `id`=?";
            $arg = array($id);
        } else {
            $sql = "SELECT  *  FROM  `employees`";
            $arg = null;
        }
        Database::connect();
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
        $sql = "INSERT INTO `employees` (`name`, `password`, `workdate`, `address`, `email`, `phone`) VALUES (?, ?, ?, ?, ?, ?)";
        Database::connect();
        return Database::insert($sql, array($name, $password, $workdate, $address, $email, $phone));
    }

    public function removeUser()
    {
        $id = $_POST["id"];
        $sql = "DELETE FROM `employees` WHERE `id` = ?";
        Database::connect();
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
        $sql = "UPDATE `employees` SET `name` = ?, `password` = ?, `workdate` = ?, `address` = ?, `email` = ?, `phone` = ? WHERE `id`=?";
        Database::connect();
        return Database::update($sql, array($name, $password, $workdate, $address, $email, $phone, $id));
    }
}
