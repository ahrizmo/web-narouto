<main class="mt-40   flex-grow ">

<?php
    require_once '../model/userClass.php';
    require_once '../model/adminClass.php';
    require_once '../model/cardClass.php';

    use model\Card;
   
    $Card = new Card();
    if(isset($_POST['search']))
    {
        if($_POST['search_input'] != "" && $_POST['filter'] != "All" )
        {
            $card = $Card->showCardsFilter($_POST['search_input'],$_POST['filter']);
        }
        elseif ($_POST['search_input'] != "")
        {
            $card = $Card->showCardsName($_POST['search_input']);
        }
        elseif ($_POST['filter'] != "All")
        {
            $card = $Card->showCardsElement($_POST['filter']);
        }
        else
        {
            $card = $Card->showCards();
        }
    }
    else
    {
        $card = $Card->showCards();

    }


    if(!$card)
    {
        $display = "
        <br>
        <br>
        <h2> No Cards currently !!</h2>
        
        ";
    }

    if (isset($_GET['id'])) {
        $Id = $_GET["id"];
        $cardID = $Card->getInfo($Id);
        echo "
                <div class=''>
                    <div class='card' >
                    <div class='flex justify-start gap-4 w-1/2 bg-gray-900 p-4 rounded-lg shadow-md'>
                        <img class='card-img-top' src='{$cardID['imgpath']}' alt='Card image' >
                        <div class='flex flex-col justify-center'>
                            <p class='text-center'> hp: {$cardID['hp']}</p><br>
                            <p class='text-center'> att: {$cardID['attack']}</p><br>
                            <p class='text-center'>cost: {$cardID['cost']}</p><br>
                            <p class='text-center'>element: {$cardID['element']}</p><br>
                            <p class='text-center'>description: {$cardID['description']}</p><br>
                        </div>
                        
                    </div>
                        <div class='card-body bg-gray-900 p-4 rounded-lg shadow-md'>
                            <h4 class='card-title'>{$cardID['name']}</h4>
                        </div>
                
                    </div>
                   
                </div>";
        echo "<a href='./cartes' class='mx-auto w-1/4 flex rounded border-0 bg-red-700 py-2 px-8 text-lg text-white hover:bg-indigo-600 focus:outline-none'> return </a>";
    }

#flex flex-wrap gap-10
    else
    {
        echo '<form action=""  method= "POST" class = "bg-gray-900 flex justify-center p-4 rounded-lg shadow-md">
            <input type="text" name="search_input"  placeholder="Search" id="title">
            <select class="form-select" id="sel1" name="filter">
              <option>All</option>
              <option>Earth</option>
              <option>Wind</option>
              <option>Fire</option>
              <option>Water</option>
              <option>Lightning</option>
              <option>Neutral</option>
            </select>
            <button type="submit" class="text-red-700 rounded-lg ml-10" name="search" >Search</button>
        </form>';
        $display = "
            <div class='grid place-items-center gap-4 mt-10
            grid-cols-2  
            sm:grid-cols-3  
            md:grid-cols-4  
            lg:grid-cols-5  
            xl:grid-cols-6 
            2xl:grid-cols-7'>";
         $cpt = -1;
        foreach($card as $news)
        {
            $cpt++;
            $card = "
                <div class='flex justify-start '>
                        <a href='cartes-{$news['cardid']}'> <img class='w-[35vw] sm:w-[25vw] md:w-[20vw] lg:w-[15vw] xl:w-[10vw] h-auto object-cover' src='{$news['imgpath']}' alt='Card image' ></a>
                        
                
                </div>
                   
               

            ";
            $display .= $card;
        }

        $display .= "
            </div>
                ";

        echo $display;

    }





?>




</main>

