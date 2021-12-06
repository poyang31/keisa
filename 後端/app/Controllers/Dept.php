<?php

require_once __DIR__ . "/../../vendor/Database.php";

class Dept extends Controller
{
    public function getDepts()
    {
        if (isset($_POST["deptID"])) {
            $deptID = $_POST["deptID"];
            $sql = "SELECT  *  FROM  `dept` WHERE `deptID`=?";
            $arg = array($deptID);
        } else {
            $sql = "SELECT  *  FROM  `dept`";
            $arg = null;
        }
        Database::connect();
        return Database::select($sql, $arg);
    }

    public function newDept()
    {
        $deptName = $_POST["deptName"];
        $sql = "INSERT INTO `dept` (`deptName`) VALUES (?)";
        Database::connect();
        return Database::insert($sql, array($deptName));
    }

    public function removeDept()
    {
        $deptID = $_POST["deptID"];
        $sql = "DELETE FROM `dept` WHERE `deptID`=?";
        Database::connect();
        return Database::delete($sql, array($deptID));
    }

    public function updateDept()
    {
        $deptID = $_POST["deptID"];
        $deptName = $_POST["deptName"];
        $sql = "UPDATE `dept` SET `deptName`=?  WHERE `deptID`=?";
        Database::connect();
        return Database::update($sql, array($deptName, $deptID));
    }
}
