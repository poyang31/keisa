<?php

require_once './mysql.php';
require_once './DB.php';

class Dept extends Controller
{
    public function getDepts()
    {
        DB::connect();
        if (isset($_POST['deptID'])) {
            $deptID = $_POST['deptID'];
            $sql = "SELECT  *  FROM  `dept` WHERE `deptID`=?";
            $arg = array($deptID);
        } else {
            $sql = "SELECT  *  FROM  `dept`";
            $arg = NULL;
        }
        return DB::select($sql, $arg);
    }
    public function newDept()
    {
        $deptName = $_POST['deptName'];

        DB::connect();
        $sql = "INSERT INTO `dept` (`deptName` ) VALUES ( ?)";
        return DB::insert($sql, array( $deptName));
    }

    public function removeDept()
    {
        $deptID = $_POST['deptID'];

        DB::connect();
        $sql = "DELETE FROM `dept` WHERE `deptID`=?";
        return DB::delete($sql, array($deptID));
    }

    public function updateDept()
    {
        $deptID = $_POST['deptID'];
        $deptName = $_POST['deptName'];

        DB::connect();
        $sql = "UPDATE `dept` SET `deptName`=?  WHERE `deptID`=?";
        return DB::update($sql, array($deptName, $deptID));
    }
}
