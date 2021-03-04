<?php
	include '../bdd/bdd.php';
	include '../bdd/client.php';
	include '../bdd/organisme.php';
	include '../bdd/formation.php';
	include '../bdd/client_formation.php';
	include '../bdd/admin.php';
	include 'auth.php';
	session_start();
	$cnx = connectBDD();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Raeda</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

		<link rel="stylesheet" href="../css/hautbas.css" type="text/css">

		<link rel="icon" type="image/png" href="../image/raedaFinal.png" />

	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-light ">
			<a class="navbar-brand" href="accueil.php">
			<img src="../image/raedaFinal.png" class="ibar" alt="">
			</a>
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" id="navbarNavDropdown">
		    	<ul class="navbar-nav">
		        	<li class="nav-item active">
		        		<a class="nav-link" href="/views/accueil.php">Accueil <span class="sr-only">(current)</span></a>
		        	</li>
		        	<li class="nav-item active">
		        		<a class="nav-link" href="/views/toutesFormations.php">Formation  <span class="sr-only">(current)</span></a>
		        	</li>
                    <li class="nav-item active">
		        		<a class="nav-link" href="/views/team.php">Presentation <span class="sr-only">(current)</span></a>
		        	</li>
		        	<li class="nav-item active">
		        		<a class="nav-link" href="/views/contact.php">Contact  <span class="sr-only">(current)</span></a>
		        	</li>
		        	<?php if (isAdmin()) { ?>
		        		<li class="nav-item active">
		        			<a class="nav-link" href="../views/gererOrganisme.php">Gérer Organismes <span class="sr-only">(current)</span></a>
		      			</li>
		      			<li class="nav-item active">
		        			<a class="nav-link" href="../views/gererClient.php">Gérer Client<span class="sr-only">(current)</span></a>
		      			</li>
		      			<li class="nav-item active">
		        			<a class="nav-link" href="../views/gererFormation.php">Gérer Formations <span class="sr-only">(current)</span></a>
		      			</li>
		      			<li class="nav-item active">
		        			<a class="nav-link" href="../views/profilAdmin.php">Profil<span class="sr-only">(current)</span></a>
		      			</li>
		      		<?php } ?>

		        	<?php if (isOrganisme()) { ?>
		        		<li class="nav-item active">
		        			<a class="nav-link" href="/views/ajouterFormation.php">Ajouter Formation <span class="sr-only">(current)</span></a>
		      			</li>
		      			<li class="nav-item active">
		        			<a class="nav-link" href="/views/profilOrganisme.php"> Profil <span class="sr-only">(current)</span></a>
		      			</li>
		      		<?php }?>

		      		<?php if (isClient()) { ?>
		      			<li class="nav-item active">
		        			<a class="nav-link" href="/views/profilClient.php"> Profil <span class="sr-only">(current)</span></a>
		      			</li>
		      		<?php }?>

		      		<?php if (!isAuth()) { ?>
			      		<li class="nav-item active">
			        		<a class="nav-link" href="/views/connexion.php">Connexion <span class="sr-only">(current)</span></a>
			      		</li>
			      		<li class="nav-item dropdown">
					        <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Inscription</a>
					        <div class="dropdown-menu dropColor" aria-labelledby="navbarDropdownMenuLink">
					            <a class="dropdown-item" href="/views/inscriptionClient.php">Client</a>
					            <a class="dropdown-item" href="/views/inscriptionOrganisme.php">Organisme</a>
					        </div>
					    </li>
					<?php }  else { ?>
						<li class="nav-item active">
		        			<a class="nav-link" href="/logic/deconnexion.php">Se déconnecter<span class="sr-only">(current)</span></a>
		      			</li>
		      		<?php } ?>

		    	</ul>
		  	</div>
		</nav>

		<main>
    
<?php 

	if (1==0) {
		if (isAuth()) {
			echo "CONNECTE : [ id : " . $_SESSION['id'] . " ] [ status : " . $_SESSION['status'] . " ]<br>";
			if (isClient()) {
				$user = getClientConnected($cnx);
				echo "Un client est connecté il s agit de $user->nom <i>$user->email";
			} else if (isOrganisme()) {
				$user = getOrganismeConnected($cnx);
				echo "Un organisme est connecté il s agit de $user->nom <i>$user->email";
			}
		} else {
			echo "L utilisateur n est pas connecté";
		}
		echo '<br>';
	}
?>