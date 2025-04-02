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

    function __construct() 
    {
        try {
            $this->conn = DataBase::getInstance()->getConnection();
        } catch (PDOException $e) {
            echo "Error establishing connection: " . $e->getMessage();
        }
    }

    function mailVerif($email)
    {
        try {
            $query = "SELECT email FROM users WHERE email = ?"; 
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            echo "Error during mail verification: " . $e->getMessage();
        }
    }

    function passVerif($password, $email)
    {
        try 
        {
            $query = "SELECT password FROM users WHERE email = ?"; 
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email]);
            $res = $stmt->fetch();
            return $password == $res['password'];
        } 
        catch (PDOException $e) 
        {
            echo "Error during password verification: " . $e->getMessage();
        }
    }

    function isAdmin($mail)
    {
        try {
            $query = "SELECT isadmin FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$mail]);
            $res = $stmt->fetchColumn();
            return $res;
        } catch (PDOException $e) {
            echo "Error checking admin status: " . $e->getMessage();
        }
    }

    function connection($mail,$pass)
    {
        try {
            $validation = false;
            if($this->mailVerif($mail))
            {
                if($this->passVerif($pass, $mail))
                {
                    if($this->isAdmin($mail))
                    {
                        $validation = true;
                        
                    }
                    
                }
            }
            return $validation;
        } catch (PDOException $e) {
            echo "Error during connection: " . $e->getMessage();
        }
    }

    function pseudoModif($oldPseudo, $newPseudo)
    {
        try {
            $query = "UPDATE users SET pseudo = ? WHERE pseudo = ?";
            $stmt = $this->conn->prepare($query);
            if($stmt)
            {
                $stmt->execute([$newPseudo, $oldPseudo]);
                echo "The pseudo has been changed.";
            }
            else echo "An error occured";
        } catch (PDOException $e) {
            echo "Error modifying pseudo: " . $e->getMessage();
        }
    }

    function emailModif($oldMail, $newMail)
    {
        try {
            $query = "UPDATE users SET email = ? WHERE email = ?";
            $stmt = $this->conn->prepare($query);
            if($stmt)
            {
                $stmt->execute([$newMail, $oldMail]);
                echo "The email has been changed.";
            }
            else echo "An error occured";
        } catch (PDOException $e) {
            echo "Error modifying email: " . $e->getMessage();
        }
    }

    function signUp()
    {
        try {
            //Récupération idMax
            $maxId = 1; 
            $query = "SELECT MAX(userId) as maxuserid FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($res && isset($res['maxuserid']) && $res['maxuserid'] !== null) 
            {
                $maxId = intval($res['maxuserid']) + 1;
            }

            // insertion
            $email = $this->email;
            $pseudo = $this->pseudo;
            $password = $this->password;

            $query = "INSERT INTO users (userId, pseudo, password, email) VALUES ($maxId, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            if($stmt)
            {
                $stmt->execute([$pseudo, $password, $email]); 
                echo "Successful registration";
            }
            else echo "Something went wrong";
        } catch (PDOException $e) {
            echo "Error during signup: " . $e->getMessage();
        }
    }

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
        try {
            $query = "SELECT * FROM news ORDER BY newsid DESC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        } catch (PDOException $e) {
            echo "Error fetching news: " . $e->getMessage();
        }
    }
}

?>
