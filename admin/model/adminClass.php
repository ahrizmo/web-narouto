<?php
namespace model;
require_once "dataBase.php"; 
use model\DataBase;


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
        try
        {
            $this->conn = DataBase::getInstance()->getConnection();
        }
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }
        
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
       try {
         //Récupération idMax

         $newsId = 1; 
         $query = "SELECT MAX(newsid) as maxnewsid FROM news";
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         $res = $stmt->fetch(\PDO::FETCH_ASSOC);
 
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
             
         }
        
       } 
       catch(PDOException $e) {
    
        echo "An error has occured : " . $e->getMessage();
        exit;
    }
        
    }


    function updateNews($id, $title, $imgName, $content) 
    {
        try {
            $query = "UPDATE news SET title = ?, imgpath = ?, content = ? WHERE newsid = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$title, $imgName, $content, $id]);
        } 
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }
    }

    function deleteNews($newsId)
    {
        try {
            $query = "DELETE FROM news WHERE newsid = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$newsId]);
        } 
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }
    }

    function getNewsTitle($newsId)
    {
        try
        {
            $query = "SELECT title FROM news WHERE newsid = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$newsId]);
            return $stmt->fetchColumn();
        }
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }

    }

    function getNewsImg($newsId)
    {
        try
        {
            $query = "SELECT imgPath FROM news WHERE newsid = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$newsId]);
            return $stmt->fetchColumn();
        }
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }

    }

    function getNewsContent($newsId)
    {
        try
        {
            $query = "SELECT content FROM news WHERE newsid = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$newsId]);
            return $stmt->fetchColumn();
        }
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }


    }


    function showMembers()
    {
        try
        {
            $query = "SELECT userid, pseudo, email, isadmin FROM users";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        }
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }

    }

    function excludeMember($userid)
    {
        try
        {
            $query = "DELETE FROM users WHERE userid = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$userid]);
        }
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }
    }


    function signUp($pseudo,$pass,$mail)
    {
        try
        {
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
        $query = "INSERT INTO users (userId, pseudo, password, email,isadmin)
                  VALUES ($maxId, ?,?,?,TRUE)
                 ";
        $stmt = $this->conn->prepare($query);
        if($stmt)
        {
            $stmt->execute([$pseudo,$pass,$mail]); 
        
        }
        }
        catch(PDOException $e) {
    
            echo "An error has occured : " . $e->getMessage();
            exit;
        }
                
    }


}


?>