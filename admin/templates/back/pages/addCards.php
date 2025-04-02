<?php 

    require_once '../model/adminClass.php';
    require_once '../model/cardClass.php';
    use model\Cards;

    $card = new Cards();

    

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        
        $name = $_POST["name"];
        $hp = $_POST["hp"];
        $attack = $_POST["attack"];
        $cost = $_POST["cost"];
        $type = $_POST["type"];
        $element = $_POST["element"];
        $description = $_POST["description"];
        $imageName = $_POST["imgName"];

        $card->addCard($name,$hp,$attack,$cost,$element,$type,$description,$imageName);
        header("Location:./cardsList.php");
        exit();



    }

?>


<main>
    <form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>">
        <p>
            <label>Name</label>
            <input type="text" name="name"  id="name" required>
        </p>

        <p>
            <label>Health Point</label>
            <input type="text" name="hp"  id="hp" required>
        </p>
        <p>
            <label>Attack</label>
            <input type="text" name="attack"  id="attack" required>
        </p>

        <p>
            <label>Cost</label>
            <input type="text" name="cost"  id="cost" required>
        </p>
        <p>
            <label>Type</label>
            <input type="text" name="type"  id="type" required>
        </p>

        <p>
            <label>Element</label>
            <input type="text" name="element"  id="element" required>
        </p>

        <p>
            <label>Description</label>
            <textarea class="form-control" rows="5" id="description" name="description"></textarea>
        </p>

        <p>
            <label>Image name</label>
            <input type="text" name="imgName"  id="imgName" required>
        </p>

        

        <button type="submit" class="btn text-black btn-sm mb-5 mt-3 " name="add" style="background-color: #ff8000">Add CARD</button>
        <a href="./cardsList.php" class="btn text-black btn-sm mb-5 mt-3 " style="background-color: #ff8000">Cancel</a>
    </form>

</main>




