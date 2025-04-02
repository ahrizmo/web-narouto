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
        $servername = "pedago01c.univ-avignon.fr";
        $username = "uapv2402097";
        $password = "9Gbi4K";
        $dbname = "etd";

        try 
        {
            $this->conn = new \PDO("pgsql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } 
        catch (\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
       
    }

    public static function getInstance() 
    {
        if (self::$instance === null) 
        {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function testSql()
    {
        $sql = "select nemp from emp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(); 
    }
      


}


?>