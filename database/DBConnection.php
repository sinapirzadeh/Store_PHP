<?php

namespace db;
class DBConnection
{
    private static $dbConnectionInstance = null;

    public static function getDbConnectionInstance()
    {
        if (self::$dbConnectionInstance == null) {
            $DBConnectionInstance = new DBConnection();
            self::$dbConnectionInstance = $DBConnectionInstance->dbConnection();
        }

        return self::$dbConnectionInstance;
    }


    public function dbConnection()
    {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db_name = 'store_db';

        try {
            $conn = mysqli_connect($servername, $username, $password, $db_name);
            if (!$conn) return 'Connection Error ' . mysqli_connect_error();
            return $conn;
        } catch (\Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
