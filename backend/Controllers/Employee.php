<?php

require_once './mysql.php';
require_once './DB.php';

class Employee extends DB
{
    public function getUsers()
    {
        DB::connect();
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $sql = "SELECT  *  FROM  `employees` WHERE `id`=?";
            $arg = array($id);
        } else {
            $sql = "SELECT  *  FROM  `employees`";
            $arg = NULL;
        }
        return DB::select($sql, $arg);
    }

    public function newUser()
    {
        $name = $_POST['name'];
        $password = $_POST['password'];
        $workdate = $_POST['workdate'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        DB::connect();
        $sql = "INSERT INTO `employees` ( `name`, `password`, `workdate`, `address`, `email`, `phone`) VALUES ( ?, ?, ?, ?, ?, ?)";
        return DB::insert($sql, array($name, $password, $workdate, $address, $email, $phone));
    }

    public function removeUser()
    {
        $id = $_POST['id'];

        DB::connect();
        $sql = "DELETE FROM `employees` WHERE `id`=?";
        return DB::delete($sql, array($id));
    }

    public function updateUser()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $password = $_POST['password'];
        $workdate = $_POST['workdate'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        DB::connect();
        $sql = "UPDATE `employees` SET `name`=?, `password`=?, `workdate`=?, `address`=?, `email`=?, `phone`=? WHERE `id`=?";
        return DB::update($sql, array($name, $password, $workdate, $address, $email, $phone, $id));
    }
}
