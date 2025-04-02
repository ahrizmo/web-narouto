<?php

require_once "dataBase.php"; 

class Admin
{
    // Attributes
    private $conn;
    public $pseudo;
    public $password;
    public $email;
    public $adminId;


    // Methods

    /*function __construct($pseudo,$password,$email,$adminId) 
    {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->adminId = $adminId;
    }*/
      
    function __construct() 
    {
     
        $this->conn = DataBase::getInstance()->getConnection();
    }

    
    function pseudoModif()
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
    }

    function addCard()
    {
        // fct addCard
    }

    function newsModif()
    {
        // fct newsModif
    }

    function addNews($title, $imgName, $content)
    {
        //Récupération idMax

        $newsId = 1; 
        $query = "SELECT MAX(newsid) as maxnewsid FROM news";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($res && isset($res['maxnewsid']) && $res['maxnewsid'] !== null) 
        {
            $newsId = intval($res['maxnewsid']) + 1;
        }

        

        // insertion

        $imgPath ="../templates/images/".$imgName;
        
        $query = "INSERT INTO news (newsid, title, imgPath, content)
                  VALUES ($newsId, ?,?,?)
                 ";
        $stmt = $this->conn->prepare($query);
        if($stmt)
        {
            $stmt->execute([$title,$imgPath,$content]); 
            echo "Successful add ";
        }
        else echo "Something went wrong";
    }

    function deleteNews($newsId)
    {
        $query = "DELETE FROM news WHERE newsid = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$newsId]);
    }

    function getNewsTitle($newsId)
    {
        $query = "SELECT title FROM news WHERE newsid = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$newsId]);
        return $stmt->fetchColumn();

    }

    function getNewsImg($newsId)
    {
        $query = "SELECT imgPath FROM news WHERE newsid = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$newsId]);
        return $stmt->fetchColumn();

    }

    function getNewsContent($newsId)
    {
        $query = "SELECT content FROM news WHERE newsid = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$newsId]);
        return $stmt->fetchColumn();


    }




    function excludeMember()
    {
        // fct excludeMember
    }


}


?>