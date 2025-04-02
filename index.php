<?php
$title = 'Naruto Ultimate Ninja Fight';
$racine_path = './';

session_start();



if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user'])) {
    // Décoder l'objet User depuis JSON
    $isLoggedIn = $_POST['user'];
}


/*template*/  include($racine_path.'templates/front/header.php');


$link = "'https://github.com/ahrizmo/web-narouto' ";
$main = "
		    <div class='flex justify-center items-center '>
		        <img src='./templates/images/titre.png' class='flex items-center'>
		    </div>
		    <div class='flex justify-center items-center '>
                <button   class='bg-white text-pink-600 hover:bg-pink-600 hover:text-white px-4 py-2 rounded flex items-center gap-2'  onclick=\"window.open($link)\">
                    <svg class='size-20 stroke-current' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor'>
                        <path stroke-linecap='round' stroke-linejoin='round' d='M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3' />
                    </svg>
                    Download        
                </button>
            </div>
            <img src='$racine_path./templates/images/imageJeu.png' class='p-10'>
            ";
$pageariane = 'Accueil';
/*template*/  include($racine_path.'templates/front/main.php');

?>

<?php /*template*/  include($racine_path.'templates/front/footer.php');?>
