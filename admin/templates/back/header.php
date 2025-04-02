<!-- Variables PHP -->


<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title?></title>
        <link rel="icon" type="image/png" href="./templates/images/logo.png">
		<!-- lien CDN pour un framework CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<!-- insérer son propre CSS -->
		<link rel="stylesheet" href="<?php echo $rootPath ?>templates/back/css/template2.css">
		
	</head>
	
	<body>
<header>

			<nav class="navbar ">
				<div class="container-fluid">
					<div class="logo_container">
						<a class="navbar-brand" href="<?php echo $rootPath ?>control/accueil.php"> <img src="<?php echo $rootPath ?>templates/images/logo.png"  class="logo"> </a>
					</div>
					<div class="d-flex flex-grow-1 justify-content-around">
						<a class="navbar-brand marginListOfCards " href="<?php echo $rootPath ?>control/cardsList.php">List of cards</a>
						<a class="navbar-brand" href="<?php echo $rootPath ?>control/actu.php">News</a>
						<a class="navbar-brand" href="<?php echo $rootPath ?>control/membres.php">Members</a>
						<a class="navbar-brand" href="<?php echo $rootPath ?>control/faq.php">Faq</a>
						<a class="navbar-brand" href="<?php echo $rootPath ?>control/login.php">Login</a>
					</div>
				</div>
			</nav>
	
</header>


	



