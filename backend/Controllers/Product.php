<?php

require_once './mysql.php';
require_once './DB.php';

class Product extends Controller
{
    public function getProducts()
    {
        DB::connect();
        if (isset($_POST['productID'])) {
            $productID = $_POST['productID'];
            $sql = "SELECT  *  FROM  `products` WHERE `productID`=?";
            $arg = array($productID);
        } else {
            $sql = "SELECT  *  FROM  `products`";
            $arg = NULL;
        }
        return DB::select($sql, $arg);
    }
    public function newProduct()
    {
        $productName = $_POST['productName'];
        $productCost = $_POST['productCost'];
        $unitprice = $_POST['unitprice'];
        $productCount = $_POST['productCount'];

        DB::connect();
        $sql = "INSERT INTO `products` (`productName`, `productCost`, `unitprice`, `productCount`) VALUES ( ?, ?, ?, ?)";
        return DB::insert($sql, array($productName, $productCost, $unitprice, $productCount));
    }

    public function removeProduct()
    {
        $productID = $_POST['productID'];

        DB::connect();
        $sql = "DELETE FROM `products` WHERE `productID`=?";
        return DB::delete($sql, array($productID));
    }

    public function updateProduct()
    {
        $productID = $_POST['productID'];
        $productName = $_POST['productName'];
        $productCost = $_POST['productCost'];
        $unitprice = $_POST['unitprice'];
        $productCount = $_POST['productCount'];

        DB::connect();
        $sql = "UPDATE `products` SET `productName`=?, `productCost`=?, `unitprice`=?, `productCount`=? WHERE `productID`=?";
        return DB::update($sql, array( $productName, $productCost, $unitprice, $productCount, $productID));
    }
}
