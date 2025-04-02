<?php
namespace model;
require_once "dataBase.php";
use model\DataBase;
class User
{
    // Attributes
    private $conn;
    public $pseudo;
    public $password;
    public $email;


    // Methods

    function __construct($pseudo, $password, $email)
    {
        $this->conn = DataBase::getInstance()->getConnection();
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
    }

    /*function __construct()
    {
        $this->conn = DataBase::getInstance()->getConnection();
        
    }*/

    function lastID(){
        $query = "SELECT MAX(userId) AS lastUserId FROM User;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute($stmt);
        return $stmt->fetch();
    }
    function addtodb(){
        if($this->email == $this->mailVerif($this->email)){
            return "mail déjà utilisé";
        }
        else{
            $query = "INSERT INTO users (userid, pseudo, password, email,isadmin) VALUES (50,'$this->pseudo','$this->password','$this->email','f')";
            $stmt = $this->conn->prepare($query);

            return $stmt->fetch();
        }
    }

    function mailVerif($email)
    {
        $query = "SELECT email FROM users WHERE email = ?"; 
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        return $stmt->fetch();
        
    }

    function passVerif($pass,$email)
    {
        $query = "SELECT password FROM users WHERE email = ? ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$email]);
        $res = $stmt->fetch();
        return password_verify($pass,$res["password"]);
    }

    function connect($mail,$pass)
    {
        $val = false;
        if($this->mailVerif($mail)){
            if($this->passVerif($pass,$mail)){
                $val = true;
            }
        }
        return $val;
    }

    function isAdmin()
    {
        $query = "SELECT isadmin 
                  FROM users
                  WHERE email = ?";


        $stmt = $this->conn->prepare($query);
        $stmt->execute([$this->email]);
        $res = $stmt->fetchColumn();
        return $res;

    }
      

    function connection()
    {
        $validation = false;
        if($this->mailVerif($this->email))
        {
            if($this->passVerif($this->password))
            {
                $validation = true;
            }
        }
        if($validation)
        {
            if($this->isAdmin())
            {
                echo "connection as an admin";// connection as an admin
            }
            else
            {
                echo "connection as a client";  // connection as a client
            }
            return true;
        }
        else 
        {
            echo "Intrus détecté, suicidez la zone !!";
        }
        return false;

    }

    function getconn()
    {
        return $this->conn;
    }

    function pseudoModif($oldPseudo, $newPseudo)
    {
        $query = "UPDATE users
                  SET pseudo = ? 
                  WHERE pseudo = ? 
                  ";
        $stmt = $this->conn->prepare($query);
        if($stmt)
        {
            $stmt->execute([$newPseudo,$oldPseudo]);
            echo "The pseudo has been changed.";
        }
        else echo "An error occured";
        
    }

    
    function emailModif($oldMail, $newMail)
    {
        $query = "UPDATE users
                  SET email = ? 
                  WHERE email = ? 
                  ";
        $stmt = $this->conn->prepare($query);
        if($stmt)
        {
            $stmt->execute([$newMail,$oldMail]);
            echo "The email has been changed.";
        }
        else echo "An error occured";
    }

    /*function signUp()
    {
        //Récupération idMax

        $maxId = 1; 
        $query = "SELECT MAX(userId) as maxuserid FROM users";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res && isset($res['maxuserid']) && $res['maxuserid'] !== null) 
        {
            $maxId = intval($res['maxuserid']) + 1;
        }

    

        

        // insertion
        $email = $this->email;
        $pseudo = $this->pseudo;
        $password = $this->password;

        $query = "INSERT INTO users (userId, pseudo, password, email)
                  VALUES ($maxId, ?,?,?)
                 ";
        $stmt = $this->conn->prepare($query);
        if($stmt)
        {
            $stmt->execute([$pseudo,$password,$email]); 
            echo "Successful registration ";
        }
        else echo "Something went wrong";
                
    }
*/

    function removeCard()
    {
        // fct removeCard
    }
    function addCard()
    {
        // fct addCard
    }

    function showNews()
    {
        $query = "SELECT * FROM news ORDER BY newsid DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $res;

    }


}

?>