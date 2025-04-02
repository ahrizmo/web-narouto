<?php
namespace model;
class Client
{
    // Attributes

    public $pseudo;
    public $password;
    public $email;
    public $clientId;


    // Methods

    function __construct($pseudo,$password,$email,$clientId) 
    {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->email = $email;
        $this->clientId = $clientId;
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

    function getCard()
    {
        // fct getCard
    }

    


}

?>