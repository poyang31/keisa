<?php
require_once "./Database.php";
require_once "./Controller.php";

class Employee
{
    public function getUsers()
    {
        $sql = "SELECT  *  FROM  `user`";
        $arg = null;
        return Database::select($sql, $arg);
    }

    public function getUser($id)
    {
        $sql = "SELECT  *  FROM  `user` WHERE `id`=?";
        $arg = array($id);
        return Database::select($sql, $arg);
    }

    public function newUser($id, $password, $email, $phone)
    {
        $sql = "INSERT INTO `user` (`id`, `password`, `email`, `phone`) VALUES (?, ?, ?, ?)";
        return Database::insert($sql, array($id, $password, $email, $phone));
    }

    public function removeUser($id)
    {
        $sql = "DELETE FROM `user` WHERE `id` = ?";
        return Database::delete($sql, array($id));
    }

    public function updateUser($id, $password, $email, $phone)
    {
        $sql = "UPDATE `user` SET `password`=?, `email`=?, `phone`=? WHERE `id` = ?";
        return Database::update($sql, array($password, $email, $phone, $id));
    }
}
