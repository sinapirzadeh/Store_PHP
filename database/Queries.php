<?php
namespace db;

class Queries extends DBConnection
{
    private static $conn;
    public function __construct()
    {
        self::$conn = self::getDbConnectionInstance();
    }


    public function select($table, $row = '*', $where = [], $limit = null, $fetch = false)
    {
        $sql = "SELECT {$row} FROM {$table}";
        if (!empty($where))
            foreach ($where as $key => $value) {
                $sql .= " {$key}={$value} ";
            }

        if (!empty($limit))
            $sql .= " LIMIT = " . $limit;

        try {
            $result = mysqli_query(self::$conn, $sql);
            if ($fetch)
                $result = mysqli_fetch_array($result);

            return $result;
        } catch (\PDOException $e) {
            echo "Error 123321 query <br>" . $e->getMessage();
        } finally {
            mysqli_close(self::$conn);
        }
    }


    public function insert($table, $keys = [], $values = [])
    {
        $sql = "INSERT INTO {$table} " . str_replace(' ', ',', $keys) . " VALUES " . str_replace(' ', ',', $values);
        try {
            if (strlen($keys) === strlen($values)) {
                $result = mysqli_query(self::$conn, $sql);
                return $result;
            }
        } catch (\Throwable $th) {
            return "Error query " . $th;
        } finally {
            mysqli_close(self::$conn);
        }
    }

    public function update($table, $key_value, $where)
    {
        $sql = "UPDATE {$table} SET";
        foreach ($key_value as $key => $value) {
            $sql .= " {$key}='{$value}', ";
        }

        $sql .= " WHERE {$where}";

        try {
            $result = mysqli_query(self::$conn, $sql);
            return $result;

        } catch (\Throwable $th) {
            return "Error query " . $th;
        } finally {
            mysqli_close(self::$conn);
        }
    }


    public function delete($table, $key, $vlaue)
    {
        $sql = "DELETE FROM {$table} WHERE {$key}={$vlaue}";

        try {
            $result = mysqli_query(self::$conn, $sql);
            return $result;
        } catch (\Throwable $th) {
            return "Error query " . $th;
        } finally {
            mysqli_close(self::$conn);
        }
    }
}