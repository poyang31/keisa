<?php

require_once __DIR__ . "/../../vendor/Database.php";

class Product extends Controller
{
    public function getProducts()
    {
        if (isset($_POST["productID"])) {
            $productID = $_POST["productID"];
            $sql = "SELECT  *  FROM  `products` WHERE `productID` = ?";
            $arg = array($productID);
        } else {
            $sql = "SELECT  *  FROM  `products`";
            $arg = null;
        }
        Database::connect();
        return Database::select($sql, $arg);
    }

    public function newProduct()
    {
        $productName = $_POST["productName"];
        $productCost = $_POST["productCost"];
        $unitprice = $_POST["unitprice"];
        $productCount = $_POST["productCount"];
        $sql = "INSERT INTO `products` (`productName`, `productCost`, `unitprice`, `productCount`) VALUES (?, ?, ?, ?)";
        Database::connect();
        return Database::insert($sql, array($productName, $productCost, $unitprice, $productCount));
    }

    public function removeProduct()
    {
        $productID = $_POST["productID"];
        $sql = "DELETE FROM `products` WHERE `productID`=?";
        Database::connect();
        return Database::delete($sql, array($productID));
    }

    public function updateProduct()
    {
        $productID = $_POST["productID"];
        $productName = $_POST["productName"];
        $productCost = $_POST["productCost"];
        $unitprice = $_POST["unitprice"];
        $productCount = $_POST["productCount"];
        $sql = "UPDATE `products` SET `productName`=?, `productCost`=?, `unitprice`=?, `productCount`=? WHERE `productID`=?";
        Database::connect();
        return Database::update($sql, array($productName, $productCost, $unitprice, $productCount, $productID));
    }
}
