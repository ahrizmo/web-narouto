<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title?></title>
		
		<!-- lien CDN pour un framework CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
		<!-- insérer son propre CSS -->
		<link rel="stylesheet" href="<?php echo $racine_path."templates/front/css/template.css"; ?>">
		
	</head>
	
	
	<body>
	
	<header>
		<div class="test">
			<nav class="navbar ">
				<div class="container-fluid">
					<a class="navbar-brand" href="<?php echo $racine_path.'index.php'; ?>"> <img src="<?php echo $racine_path.''; ?>templates/images/logo.png"  class="logo"> </a>
					<a class="navbar-brand" href="<?php echo $racine_path.'control/cartes.php'; ?>">Listes des cartes</a>
					<a class="navbar-brand" href="<?php echo $racine_path.'control/actu.php'; ?>">Actualité</a>
					<a class="navbar-brand" href="<?php echo $racine_path.'control/contact.php'; ?>"> Login </a>
					
				</div>
			</nav>
		</div>
	
	</header>
	