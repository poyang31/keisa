<?php

require_once __DIR__ . "/Controller.php";

class Database extends Controller
{
    public static $dbHost;
    public static $dbName;
    public static $dbUser;
    public static $dbPassword;
    public static $conn = null;

    public static function connect()
    {
        if (self::$conn != null) {
            return;
        }

        $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::$dbHost, self::$dbName);

        try {
            self::$conn = new PDO($dsn, self::$dbUser, self::$dbPassword);
        } catch (PDOException $e) {
            self::$conn = null;
        }
    }

    public static function select($sql, $args)
    {
        if (self::$conn == null) {
            return self::response(14, "無法開啟DB");
        }

        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);

        if ($result) {
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return self::response(200, "查詢成功", $rows);
        } else {
            return self::response(400, "SQL錯誤");
        }
    }

    public static function insert($sql, $args)
    {
        if (self::$conn == null) {
            return self::response(14, "無法開啟DB");
        }

        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);
        if ($result) {
            $count = $stmt->rowCount();
            return ($count < 1) ? self::response(204, "新增失敗") : self::response(200, "新增成功");
        } else {
            return self::response(400, "SQL錯誤");
        }
    }

    public static function delete($sql, $args)
    {
        if (self::$conn == null) {
            return self::response(14, "無法開啟DB");
        }

        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);
        if ($result) {
            $count = $stmt->rowCount();
            return ($count < 1) ? self::response(204, "刪除失敗") : self::response(200, "刪除成功");
        } else {
            return self::response(400, "SQL錯誤");
        }
    }

    public static function update($sql, $args)
    {
        if (self::$conn == null) {
            return self::response(14, "無法開啟DB");
        }

        $stmt = self::$conn->prepare($sql);
        $result = $stmt->execute($args);
        if ($result) {
            $count = $stmt->rowCount();
            return ($count < 1) ? self::response(204, "更新失敗") : self::response(200, "更新成功");
        } else {
            return self::response(400, "SQL錯誤");
        }
    }
}
