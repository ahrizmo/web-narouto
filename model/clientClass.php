<?php
namespace model;
require_once "userClass.php";
use model\DataBase;
use model\User;
class Client extends User
{
    // Attributes

    public $clientId;
    public $favcard;

    // Methods

    function __construct($pseudo,$password,$email)
    {
        parent::__construct($pseudo,$password,$email);
        $this->favcard = array(5);
    }
      
    function signUp()
    {
        try
        {
            $conn = $this->getconn();
            //Récupération idMax
            $maxId = 1;
            $query = "SELECT MAX(userId) as maxuserid FROM users";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($res && isset($res['maxuserid']) && $res['maxuserid'] !== null)
            {
                $maxId = intval($res['maxuserid']) + 1;
            }
            // insertion
            $query = "INSERT INTO users (userid, pseudo, password, email,isadmin)
                  VALUES ($maxId, ?,?,?,FALSE)
                 ";
            $stmt = $conn->prepare($query);
            if($stmt)
            {
                $stmt->execute([$this->pseudo,$this->password,$this->email]);

            }
        }
        catch(\PDOException $e) {

            echo "An error has occured : " . $e->getMessage();
            echo "<br class='mt-40'>pseudo: $this->pseudo ,password: $this->password ,mail: $this->email ";
            exit;
        }
    }
    
    /*function pseudoModif()
    {
        // fct pseudoModif
    }

    function emailModif()
    {
        // fct emailModif
    }

    function removeCard()
    {
        // fct removeCard
    }*/

    /*function addCard()
    {
        // fct addCard
    }*/

    function getInfo($email)
    {
        try {
            $conn = $this->getconn();
            $query = "SELECT * from users where email = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$email]);
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $res;
        } catch(\PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    


}

?>