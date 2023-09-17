<?php
require __DIR__ . '.././vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
class dataBaseConnection
{
    static $conn;
    private function __construct()
    {
        try {
            dataBaseConnection::$conn = new PDO($_ENV['DB_CONNECTION'] . ":host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            dataBaseConnection::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            die($e->getMessage());
        }
    }
    static function connect()
    {
        if (!is_object(dataBaseConnection::$conn)) {
            new dataBaseConnection();
        }
    }
    static function getData($table, $columns = "*", $condition = true)
    {
        $query = "SELECT $columns FROM $table WHERE $condition";
        $data = dataBaseConnection::$conn->query($query);
        return $data->fetchAll();
    }
    static function getDataPagenation($table ,$z, $columns = "*" ,$condition = true)
    {
        $y=8;
        $x=($z)* (8);
        $query = "SELECT $columns FROM $table WHERE $condition LIMIT $y OFFSET $x ";
        $sql=dataBaseConnection::$conn->prepare($query);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    static function insertData($table, $columns, $data, $message, $path)
    {
        foreach ($columns as $column) {
            $c[] = '`' . $column . '`';
        }
        $col = implode(', ', $c);
        $d = array_map(function ($x) {
            return gettype($x) == 'string' ? "'" . $x . "'" : $x;
        }, $data);
        $info = implode(', ', $d);
        $query = "INSERT INTO $table ($col) VALUES ($info)";
        $sql = dataBaseConnection::$conn->prepare($query);
        header("location:$path");
        $_SESSION["success"] = $message . " added successfully!";
        return $sql->execute();
    }

    static function updateData($table, $con,$data, $condition)
    {
        $query = "UPDATE $table SET `$con`='$data' WHERE id='$condition'";
        $sql = dataBaseConnection::$conn->prepare($query);
        return $sql->execute();
    }

    static function deleteData($table, $condition = true)
    {
        $query = "DELETE FROM $table WHERE id=$condition";
        $sql = dataBaseConnection::$conn->prepare($query);
        $_SESSION["delete"] = "task deleted successfully!";
        return $sql->execute();
    }
}