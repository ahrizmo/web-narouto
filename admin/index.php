<!-- Variables PHP -->
 <?php
    
    $rootPath ='./';
    $method = "POST";
    $action = "index.php";
    $title = "Narouto Ultimate Ninja Fight";
 
    include $rootPath.'templates/back/header.php'; 

    $main = "
    <main>
        <img src= './templates/images/titre.png'  class='titreIMG'>
        <h2>You are on the admin's connection page</h2>
        
        <form action=' $action ' method= '$method'>
            <p>
                <label>E-mail</label>
                <input type='email' name='E-mail' id='E-mail' required>
            </p>

        <p>
            <label>Password</label>
            <input type='password' name='password' id='password' required>
        </p>
        <input type='submit'>
        </form>

    </main>";

    echo $main;



    require_once './model/userClass.php';
    //require_once "../model/adminClass.php";
        use model\User;

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $mail = $_POST["E-mail"];
        $pass = $_POST["password"];
        $test = new User();
        if($test->connection($mail,$pass))
        {
            //$_SESSION['isConnected'] = true;
            header("Location: ./control/accueil.php");
            exit();
        }
        else
        {
            echo "Access denied";
        }


    }








    include $rootPath.'templates/back/footer.php'; 


?>
