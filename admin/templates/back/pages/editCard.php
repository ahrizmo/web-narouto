<?php

    require_once '../model/cardClass.php';
    use model\Cards;

    $card = new Cards();
    $cardId ="";
    $name ="";
    $hp ="";
    $attack = "";
    $cost ="";
    $type ="";
    $element ="";
    $description = "";
    $imgValue = "";

    if(isset($_GET["edit"]))
    {   
        $cardId = $_GET["edit"];
        $info = $card->getInfo($cardId);
        $name =$info['name'];
        $hp =$info['hp'];
        $attack = $info['attack'];
        $cost = $info['cost'];
        $type = $info['type'];
        $element = $info['element'];
        $description = $info['description'];
        $imgValue = $info['imgpath'];

        

    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $cardid = isset($_POST["cardId"]) ? $_POST["cardId"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $hp = isset($_POST["hp"]) ? $_POST["hp"] : "";
        $attack = isset($_POST["attack"]) ? $_POST["attack"] : "";
        $cost = isset($_POST["cost"]) ? $_POST["cost"] : "";
        $type = isset($_POST["type"]) ? $_POST["type"] : "";
        $element = isset($_POST["element"]) ? $_POST["element"] : "";
        $description = isset($_POST["description"]) ? $_POST["description"] : "";
        $imgValue = isset($_POST["imgName"]) ? $_POST["imgName"] : "";
        
        
        $imgName = "../templates/images/";
        $imgName .= isset($_POST["imgName"]) ? $_POST["imgName"] : "";
        
        $card->updateCard($cardid,$name,$hp,$attack,$cost,$element,$type,$description,$imgName);
        header("Location:./cardsList.php");
        exit();       
        

    }

    

?>



<main>
    <form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>">

            <p>
                <input type="hidden" name="cardId" value="<?php echo $cardId ?>">
            </p>
            <p>
                <label>Name</label>
                <input type="text" name="name" value ="<?php echo $name ?>" id="name" required>
            </p>

            <p>
                <label>Health Point</label>
                <input type="text" name="hp" value ="<?php echo $hp ?>" id="hp" required>
            </p>
            <p>
                <label>Attack</label>
                <input type="text" name="attack" value ="<?php echo $attack ?>" id="attack" required>
            </p>

            <p>
                <label>Cost</label>
                <input type="text" name="cost" value ="<?php echo $cost ?>" id="cost" required>
            </p>
            <p>
                <label>Type</label>
                <input type="text" name="type" value ="<?php echo $type ?>" id="type" required>
            </p>

            <p>
                <label>Element</label>
                <input type="text" name="element" value ="<?php echo $element ?>" id="element" required>
            </p>

            <p>
                <label>Description</label>
                <textarea class="form-control" rows="5" id="description" name="description"><?php echo $description ?></textarea>
            </p>

            <p>
                <label>Image name</label>
                <input type="text" name="imgName" value ="<?php echo $imgValue ?>" id="imgName" required>
            </p>

            

            <button type="submit" class="btn text-black btn-sm mb-5 mt-3 " name="edit" style="background-color: #ff8000">EDIT CARD</button>
            <a href="./cardsList.php" class="btn text-black btn-sm mb-5 mt-3 " style="background-color: #ff8000">CANCEL</a>
        </form>

</main>


