<?php include '../php/debutPage.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/connexion.css" type="text/css" media="screen">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>
</head>
<body>


<?php
if (!empty($_POST)) {

	$email = $_POST['email'];
	$mdp = $_POST['mdp'];

	if ($client = connectClient($cnx, $email, $mdp)) {
		$_SESSION['id'] = $client->id;
		$_SESSION['status'] = 'client';
		header('Location: accueil.php');
	} else if ($organisme= connectOrganisme($cnx, $email, $mdp)) {
		$_SESSION['id'] = $organisme->id;
		$_SESSION['status'] = 'organisme';
		header('Location: profilOrganisme.php');
	}else if ($admin = connectAdmin ($cnx, $email, $mdp)) {
		$_SESSION['id'] = $admin->id;
		$_SESSION['status'] = 'admin';
		header('Location: accueil.php');
	} else {
	sendErreur('Erreur email ou mot de passe est incorect');
	}
}
?>



<form action='/views/connexion.php' method='POST' class="boite">
<h1>Connexion</h1>
<!-- <label for="email">Email</label> -->
<input type="email" class="form-control" id="email" placeholder="Entrez votre email" name='email'>
<!-- <label for="mdp">Mot de passe</label> -->
   <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name='mdp'>
<input type='submit' value="Connecter" name="">
</form>




<?php include '../php/finPage.php'; ?>
