<?php 

    require_once '../model/adminClass.php';
    use model\Admin;

    $test = new Admin();

    

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        
        $title = $_POST["title"];
        $imageName = $_POST["imgName"];
        $content = $_POST["content"];
        $test->addNews($title,$imageName,$content);
        header("Location:./actu.php");
        exit();



    }

?>


<main>
    <form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>">
        <p>
            <label>Title</label>
            <input type="text" name="title"  id="title" required>
        </p>

        <p>
            <label>image name</label>
            <input type="text" name="imgName"  id="imgName" required>
        </p>

        <p>
            <label>Content</label>
            <textarea class="form-control" rows="5" id="content" name="content"></textarea>
        </p>

        <button type="submit" class="btn text-black btn-sm mb-5 mt-3 " name="add" style="background-color: #ff8000">Add NEWS</button>
        <a href="./actu.php" class="btn text-black btn-sm mb-5 mt-3 " style="background-color: #ff8000">Cancel</a>
    </form>

</main>




