<?php

require_once __DIR__ . "/../../vendor/Database.php";

class Product extends Controller
{
    public function getProducts()
    {
        Database::connect();
        if (isset($_POST["productID"])) {
            $productID = $_POST["productID"];
            $sql = "SELECT  *  FROM  `products` WHERE `productID` = ?";
            $arg = array($productID);
        } else {
            $sql = "SELECT  *  FROM  `products`";
            $arg = null;
        }
        return Database::select($sql, $arg);
    }

    public function newProduct()
    {
        $productName = $_POST["productName"];
        $productCost = $_POST["productCost"];
        $unitprice = $_POST["unitprice"];
        $productCount = $_POST["productCount"];

        Database::connect();
        $sql = "INSERT INTO `products` (`productName`, `productCost`, `unitprice`, `productCount`) VALUES (?, ?, ?, ?)";
        return Database::insert($sql, array($productName, $productCost, $unitprice, $productCount));
    }

    public function removeProduct()
    {
        $productID = $_POST["productID"];

        Database::connect();
        $sql = "DELETE FROM `products` WHERE `productID`=?";
        return Database::delete($sql, array($productID));
    }

    public function updateProduct()
    {
        $productID = $_POST["productID"];
        $productName = $_POST["productName"];
        $productCost = $_POST["productCost"];
        $unitprice = $_POST["unitprice"];
        $productCount = $_POST["productCount"];

        Database::connect();
        $sql = "UPDATE `products` SET `productName`=?, `productCost`=?, `unitprice`=?, `productCount`=? WHERE `productID`=?";
        return Database::update($sql, array($productName, $productCost, $unitprice, $productCount, $productID));
    }
}
