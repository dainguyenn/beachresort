<?php
 
class Connect
{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "dainguyen12";
    private static $database = "ltmt";
    private static $conn;

    // Create connection

    public function __construct()
    {
        $conn = new mysqli(self::$servername, self::$username, self::$password, self::$database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return self::$conn = $conn;
    }

    public function query($sql)
    {
        $success = self::$conn->query($sql);
        if ($success === false) {
            throw new Exception("SQL query failed");
        }

        return $success;
    }
}
