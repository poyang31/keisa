<?php

require_once './mysql.php';
require_once './DB.php';

class Supplier extends Controller
{
    public function getsuppliers()
    {
        DB::connect();
        if (isset($_POST['supplierID'])) {
            $supplierID = $_POST['supplierID'];
            $sql = "SELECT  *  FROM  `supplier` WHERE `supplierID`=?";
            $arg = array($supplierID);
        } else {
            $sql = "SELECT  *  FROM  `supplier`";
            $arg = NULL;
        }
        return DB::select($sql, $arg);
    }

    public function newSupplier()
    {
        $supplierName = $_POST['supplierName'];
        $contactPerson = $_POST['contactPerson'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];


        DB::connect();
        $sql = "INSERT INTO `supplier` ( `supplierName`, `contactPerson`, `phoneNumber` , `address`) VALUES ( ?, ?, ?, ?)";
        return DB::insert($sql, array($supplierName, $contactPerson, $phoneNumber, $address));
    }

    public function removeSupplier()
    {
        $supplierID = $_POST['supplierID'];

        DB::connect();
        $sql = "DELETE FROM `supplier` WHERE `supplierID`=?";
        return DB::delete($sql, array($supplierID));
    }

    public function updateSupplier()
    {
        $supplierID = $_POST['supplierID'];
        $supplierName = $_POST['supplierName'];
        $contactPerson = $_POST['contactPerson'];
        $phoneNumber = $_POST['phoneNumber'];
        $address = $_POST['address'];

        DB::connect();
        $sql = "UPDATE `supplier` SET `supplierName`=?, `contactPerson`=?, `phoneNumber`=? , `address`=? WHERE `supplierID`=?";
        return DB::update($sql, array($supplierName, $contactPerson, $phoneNumber, $address, $supplierID));
    }
}
