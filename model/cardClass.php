<?php
namespace model;
require_once "dataBase.php";
use model\dataBase;
class Card
{
    // Attributes

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

    function __construct($name=null,$hp=null,$attack=null,$cost=null,$element=null,$type=null,$description=null,$imgPath=null,$cardId=null)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->cost = $cost;
        $this->element = $element;
        $this->type = $type;
        $this->description = $description;
        $this->imgPath = $imgPath;
        $this->cardId = $cardId;
    }



    function modify($name,$hp,$attack,$cost,$element,$type,$description,$imgPath,$cardId)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->attack = $attack;
        $this->cost = $cost;
        $this->element = $element;
        $this->type = $type;
        $this->description = $description;
        $this->imgPath = $imgPath;
        $this->cardId = $cardId;
    }


    public static function showCards()
    {
        $conn = DataBase::getInstance()->getConnection();
        $query = "SELECT * FROM Card ORDER BY cardId DESC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $res;

    }

    public function showCardsElement($element)
    {
        try {
            $conn = DataBase::getInstance()->getConnection();
            $query = "SELECT * FROM card WHERE element = ? ORDER BY cardid";
            $stmt = $conn->prepare($query);
            $stmt->execute([$element]);
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    public function showCardsName($name)
    {
        try {
            $conn = DataBase::getInstance()->getConnection();
            $Name = $name.'%';
            $query = "SELECT * FROM card WHERE name like ? ORDER BY cardid";
            $stmt = $conn->prepare($query);
            $stmt->execute([$Name]);
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }


    public function showCardsFilter($name,$element)
    {
        try {
            $conn = DataBase::getInstance()->getConnection();
            $Name = $name.'%';
            $query = "SELECT * FROM card WHERE name like ? and element = ? ORDER BY cardid";
            $stmt = $conn->prepare($query);
            $stmt->execute([$Name,$element]);
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }

    public function getInfo($cardid)
    {
        try {
            $conn = DataBase::getInstance()->getConnection();
            $query = "SELECT * from card where cardid = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$cardid]);
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $res;
        } catch(PDOException $e) {
            echo "An error has occurred: " . $e->getMessage();
        }
    }



}

?>