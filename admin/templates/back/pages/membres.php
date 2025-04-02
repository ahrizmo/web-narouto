<main>

<?php 
    require_once '../model/userClass.php';
    require_once '../model/adminClass.php';
    use model\Admin;

    $admin = new Admin();
    $members = $admin->showMembers();
    

    if(!$members)
    {
        $display = "
        <br>
        <br>
        <h2> No members currently !!</h2>
        
        ";
    }
    else
    {
        $display = "
            <table class='table table-hover'>
                <thead>
                  <tr>
                    <th>User id</th>
                    <th>Pseudo</th>
                    <th>Email</th>
                    <th>Is Admin</th>
                  </tr>
                </thead>
                <tbody>";




        foreach($members as $members)
        {
            $table = "

                <tr>
                    <td>{$members['userid']}</td>
                    <td>{$members['pseudo']}</td>
                    <td>{$members['email']}</td>
                    <td>{$members['isadmin']}</td>
                    <td>
                        <form action='membres.php' method='POST'>
                            <button type='submit' name='exclude' value='{$members['userid']}' class='btn btn-danger text-white btn-sm  w-100'>EXCLUDE</button>
                        </form>
                    </td>
                
                    
                </tr>
                
            

            ";
            $display .= $table;
        }

        $display .= "
            </tbody>
              </table>";
        
                

    }

    echo $display;

   if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        
        if(isset($_POST["exclude"]))
        {
            
            $userId = intval($_POST["exclude"]);
            $ad = new Admin();
            $ad->excludeMember($userId);
            header("Location:./membres.php");

        }
    }
        
?>




</main>

