<main>
<a href="./addCards.php" class="btn text-black btn-sm mb-5 mt-3" style="background-color: #ff8000">Add Card</a>

<?php 
    require_once '../model/cardClass.php';
    //require_once '../model/adminClass.php';
    use model\Cards;

    $cardInstance = new Cards();
    $card = $cardInstance->showCards();
    

    if(!$card)
    {
        $display = "
        <br>
        <br>
        <h2> No cards currently !!</h2>
        
        ";
    }
    else
    {
        $display = "
            <div class='container mt-3'>
                <div class='row'>";

        foreach($card as $card)
        {
            $list = "
                <div class='col-md-6 mb-5 mt-3'>
                    <div class='card d-flex flex-row'>
                        <img class='card-img-top' src='{$card['imgpath']}' alt='Card image' style='width:50%; height: 480px;'>
                        <div class='card-body' style='width:50%; height: 480px; display: flex; flex-direction: column; background-image: url(../templates/images/dosCarte.png); background-size: 100% 100%; background-repeat: no-repeat; object-fit: cover; color: white; text-shadow: 2px 2px 2px #000000;'>
                            <h3 class='card-title text-center '>{$card['name']}</h3>
                            <p class='card-text fs-4'>Hp : {$card['hp']}</p>
                            <p class='card-text fs-4'>Attack : {$card['attack']}</p>
                            <p class='card-text fs-4'>Cost : {$card['cost']}</p>
                            <p class='card-text fs-4'>Type : {$card['type']}</p>
                            <p class='card-text fs-4'>Element : {$card['element']}</p>
                            <p class='card-text fs-4'>Description : </p>
                            <p class='card-text'>{$card['description']}</p>
                        </div>
                
                    </div>
                    <div class='btn-group d-flex' style='width: 100%;'>
                        <form method='GET' action='./editCard.php' class='flex-fill'>
                            <button type='submit' name='edit' value='{$card['cardid']}' style='width: 100%;' class='btn btn-warning text-white btn-sm  w-100'>EDIT</button>
                        </form>
                        <form method='POST' action='cardsList.php' class='flex-fill' >
                            <button type='submit' name='delete' value='{$card['cardid']}' class='btn btn-danger text-white btn-sm  w-100'>DELETE</button>
                        </form>
                    </div>
                </div>

            ";
            $display .= $list;
        }

        $display .= "
            </div>
                </div>";
        
                

    }

    echo $display;

   if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if(isset($_POST["delete"]))
        {
            
            $cardId = intval($_POST["delete"]);
            $ad = new Cards();
            $ad->deleteCard($cardId);
            header("Location:./cardsList.php");

        }
    }
        
?>




</main>

