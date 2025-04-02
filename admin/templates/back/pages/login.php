<main>
        <img src= '../templates/images/titre.png'  class='titreIMG'>
        <h4>Add a new admin</h4>
        
        <form action=' login.php ' method= 'POST'>
            <p>
                <label>E-mail</label>
                <input type='email' name='E-mail' id='E-mail' required>
            </p>
            <p>
            <label>Pseudo</label>
            <input type='pseudo' name='pseudo' id='pseudo' required>
        </p>
        <p>
            <label>Password</label>
            <input type='password' name='password' id='password' required>
        </p>
        <input type='submit'>
        </form>
        
        <br>
        <form action=' login.php ' method= 'POST'>
            <p>
                <input type='submit' name='logout' id='logout' value='Log out' required>
            </p>
        </form>

</main>

<?php 
    require_once "../model/adminClass.php";
    use model\Admin;
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $mail = $_POST["E-mail"];
        $pass = $_POST["password"];
        $pseudo = $_POST["pseudo"];
        
        

        $admin = new Admin();
        $admin->signUp($pseudo,$pass,$mail);

    }

    


?>