<?php

require_once __DIR__ . "/../../vendor/Database.php";

class Supplier extends Controller
{
    public function getsuppliers()
    {
        if (isset($_POST["supplierID"])) {
            $supplierID = $_POST["supplierID"];
            $sql = "SELECT  *  FROM  `supplier` WHERE `supplierID` = ?";
            $arg = array($supplierID);
        } else {
            $sql = "SELECT  *  FROM  `supplier`";
            $arg = null;
        }
        Database::connect();
        return Database::select($sql, $arg);
    }

    public function newSupplier()
    {
        $supplierName = $_POST["supplierName"];
        $contactPerson = $_POST["contactPerson"];
        $phoneNumber = $_POST["phoneNumber"];
        $address = $_POST["address"];
        $sql = "INSERT INTO `supplier` (`supplierName`, `contactPerson`, `phoneNumber` , `address`) VALUES (?, ?, ?, ?)";
        Database::connect();
        return Database::insert($sql, array($supplierName, $contactPerson, $phoneNumber, $address));
    }

    public function removeSupplier()
    {
        $supplierID = $_POST["supplierID"];
        $sql = "DELETE FROM `supplier` WHERE `supplierID` = ?";
        Database::connect();
        return Database::delete($sql, array($supplierID));
    }

    public function updateSupplier()
    {
        $supplierID = $_POST["supplierID"];
        $supplierName = $_POST["supplierName"];
        $contactPerson = $_POST["contactPerson"];
        $phoneNumber = $_POST["phoneNumber"];
        $address = $_POST["address"];
        $sql = "UPDATE `supplier` SET `supplierName`= ?, `contactPerson`= ?, `phoneNumber`= ?, `address`= ? WHERE `supplierID` = ?";
        Database::connect();
        return Database::update($sql, array($supplierName, $contactPerson, $phoneNumber, $address, $supplierID));
    }
}
