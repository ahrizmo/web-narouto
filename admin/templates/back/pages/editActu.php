<?php

    require_once '../model/adminClass.php';
    use model\Admin;

    $test = new Admin();
    $titleValue ="";
    $imgValue ="";
    $contentValue ="";
    $newsId = "";
    if(isset($_GET["edit"]))
    {   
        $newsId = $_GET["edit"];
        $titleValue = $test->getNewsTitle($_GET["edit"]);
        $imgValue = $test->getNewsImg($_GET["edit"]);
        $contentValue = $test->getNewsContent($_GET["edit"]);
        

    }

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $title = isset($_POST["title"]) ? $_POST["title"] : "";
        $imageName = "../templates/images/";
        $imageName .= isset($_POST["imgName"]) ? $_POST["imgName"] : "";
        $content = isset($_POST["content"]) ? $_POST["content"] : "";
        $id = isset($_POST["newsId"]) ? $_POST["newsId"] : "";
        $test->updateNews($id,$title,$imageName,$content);
        header("Location:./actu.php");
        exit();       
        

    }

    

?>


<main>
    <form action="<?php echo "$action"; ?>" method="<?php echo "$method"; ?>">
        <p>
            <label>Title</label>
            <input type="text" name="title" value ="<?php echo $titleValue ?>" id="title" required>
        </p>

        <p>
            <label>image name</label>
            <input type="text" name="imgName" value ="<?php echo $imgValue ?>" id="imgName" required>
        </p>

        <p>
            <label>Content</label>
            <textarea class="form-control" rows="5" id="content" name="content"><?php echo $contentValue ?></textarea>
        </p>

        <p>
            <input type="hidden" name="newsId" value="<?php echo $newsId ?>">
        </p>
        
        <button type="submit" class="btn text-black btn-sm mb-5 mt-3 " name="edit" style="background-color: #ff8000">Edit NEWS</button>
        <a href="./actu.php" class="btn text-black btn-sm mb-5 mt-3 " style="background-color: #ff8000">Cancel</a>
    </form>

</main>


