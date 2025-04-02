<?php
namespace model;
require_once "dataBase.php";
use model\DataBase;

class Cards
{
    // Attributes
    private $conn;

    public $name;
    public $hp;
    public $attack;
    public $cost;
    public $element;
    public $type;
    public $description;
    public $imgPath;
    public $cardId;


    // Methods

    function __construct() 
    {
        try {
            $this->conn = DataBase::getInstance()->getConnection();
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    function modify($name,$hp,$attack,$cost,$element,$type,$description,$imgPath,$cardId) 
    {
        try {
            $this->name = $name;
            $this->hp = $hp;
            $this->attack = $attack;
            $this->cost = $cost;
            $this->element = $element;
            $this->type = $type;
            $this->description = $description;
            $this->imgPath = $imgPath;
            $this->cardId = $cardId;
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    function addCard($name,$hp,$attack,$cost,$element,$type,$description,$imgName)
    {
        try {
            //Récupération idMax
            $cardId = 1; 
            $query = "SELECT MAX(cardid) as maxcardid FROM card";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($res && isset($res['maxcardid']) && $res['maxcardid'] !== null) 
            {
                $cardId = intval($res['maxcardid']) + 1;
            }

            // insertion
            $imgPath ="../templates/images/".$imgName;

            $query = "INSERT INTO card (cardid,name,hp,attack,cost,element,type,description,imgpath)
                      VALUES ($cardId,?,?,?,?,?,?,?,?)";
            $stmt = $this->conn->prepare($query);
            if($stmt)
            {
                $stmt->execute([$name,$hp,$attack,$cost,$element,$type,$description,$imgPath]); 
            }
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    function deleteCard($cardId)
    {
        try {
            $query = "DELETE FROM card WHERE cardid = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$cardId]);
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    function updateCard($cardid,$name,$hp,$attack,$cost,$element,$type,$description,$imgName)
    {
        try {
            $query = "UPDATE card SET name = ?, hp = ?, attack = ?, cost = ?, element = ?, type = ?, description = ?, imgpath = ? WHERE cardid = ?";
            $stmt = $this->conn->prepare($query);
            var_dump([$name, $hp, $attack, $cost, $element, $type, $description, $imgName, $cardid]);
            $stmt->execute([$name,$hp,$attack,$cost,$element,$type,$description,$imgName,$cardid]);
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    function showCards()
    {
        try {
            $query = "SELECT cardid,name, hp, attack, cost, type, element, description, imgpath FROM card";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    public function getInfo($cardid)
    {
        try {
            $query = "SELECT * from card where cardid = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$cardid]);
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }
}
?>
