<main class="mt-40 flex-grow ">


<?php
    require_once '../model/userClass.php';
    require_once '../model/adminClass.php';


    use model\User;

    $user = new User("","","");
    $news = $user->showNews();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        echo "<div class='flex flex-wrap justify-center '>";
        echo " <div class='flex flex-col items-center max-w-xs'>";
        echo "<img  src=\"{$news[$id]['imgpath']}\" alt='Card image' class='mb-2 rounded-lg'>";
        echo "<p class='text-center'>{$news[$id]['title']}</p>";
        echo "<p class='text-center'> {$news[$id]['content']}</p>";
        echo "<a href='./actu' class='mx-auto flex rounded border-0 bg-indigo-500 py-2 px-8 text-lg text-white hover:bg-indigo-600 focus:outline-none'> return </a>";
    }
    else {


        if (!$news) {
            $display = "
            <br>
            <br>
            <h2> No news currently !!</h2>
            
            ";
        } else {
            $display = "
                <div class='flex flex-col items-start left-0 gap-8 pl-1/4 p-6'>";
            $cpt = -1;
            foreach ($news as $news) {
                $cpt++;
                $card = "
                     <div class='flex justify-start gap-4 w-1/2 bg-gray-900 p-4 rounded-lg shadow-md'>
                        <a href='actu-{$cpt}' class='flex items-center gap-4 w-full max-w-lg p-4 rounded-lg shadow-md''>
                            <img  src='{$news['imgpath']}' alt='Card image' class='rounded-lg w-1/4'>
                            <div class='card-body'>
                                <h4 class='w-3/4 text-white'>{$news['title']}</h4>
                            </div>
                        </a>
                    </div>
                    
                      
                
                
    
                ";
                $display .= $card;
            }

            $display .= "
                </div>";


        }

        echo $display;
    }


?>




</main>

