<main>
<a href="./ajoutActu.php" class="btn text-black btn-sm mb-5 mt-3" style="background-color: #ff8000">Add NEWS</a>

<?php 
    require_once '../model/userClass.php';
    require_once '../model/adminClass.php';
    use model\User;
    use model\Admin;
    $user = new User();
    $news = $user->showNews();
    

    if(!$news)
    {
        $display = "
        <br>
        <br>
        <h2> No news currently !!</h2>
        
        ";
    }
    else
    {
        $display = "
            <div class='container mt-3'>
                <div class='row'>";

        foreach($news as $news)
        {
            $card = "
                <div class='col-md-4 mb-5 mt-3'>
                    <div class='card' style='width:100%; height:400px'>
                        <img class='card-img-top' src='{$news['imgpath']}' alt='Card image' style='width:100%; height:300px'>
                        <div class='card-body'>
                            <h4 class='card-title'>{$news['title']}</h4>
                            <p class='card-text'>{$news['content']}</p>
                        </div>
                
                    </div>
                    <div class='btn-group d-flex' style='width: 100%;'>
                        <form method='GET' action='./editActu.php' class='flex-fill'>
                            <button type='submit' name='edit' value='{$news['newsid']}' style='width: 100%;' class='btn btn-warning text-white btn-sm  w-100'>EDIT</button>
                        </form>
                        <form method='POST' action='actu.php' class='flex-fill' >
                            <button type='submit' name='delete' value='{$news['newsid']}' class='btn btn-danger text-white btn-sm  w-100'>DELETE</button>
                        </form>
                    </div>
                </div>

            ";
            $display .= $card;
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
            
            $newsId = intval($_POST["delete"]);
            echo $newsId;
            $ad = new Admin();
            $ad->deleteNews($newsId);
            header("Location:./actu.php");

        }
    }
        
?>




</main>

