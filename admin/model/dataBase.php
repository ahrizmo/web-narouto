<?php

namespace model;

class DataBase
{
    // Attributes

    private static $instance = null; 
    private $conn;

    // Methods

    function __construct() 
    {
        try {
            $servername = "pedago01c.univ-avignon.fr";
            $username = "uapv2402097";
            $password = "9Gbi4K";
            $dbname = "etd";

            $this->conn = new \PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() 
    {
        try {
            if (self::$instance === null) 
            {
                self::$instance = new DataBase();
            }
            return self::$instance;
        } catch (PDOException $e) {
            echo "Error during Database instance creation: " . $e->getMessage();
        }
    }

    public function getConnection() 
    {
        try {
            return $this->conn;
        } catch (PDOException $e) {
            echo "Error getting connection: " . $e->getMessage();
        }
    }

    public function testSql()
    {
        try {
            $sql = "select nemp from emp";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(); 
        } catch (PDOException $e) {
            echo "Error executing SQL query: " . $e->getMessage();
        }
    }
}
?>
