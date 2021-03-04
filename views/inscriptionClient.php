<?php include '../php/debutPage.php'; ?>

<?php
	if (!empty($_POST)) {

		$pseudo = $_POST['pseudo'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$ville = $_POST['ville'];
		$adresse = $_POST['adresse'];
		$c_p = $_POST['c_p'];
		$telephone = $_POST['telephone'];
		$ddn = $_POST['ddn'];
		$profession = $_POST['profession'];
		$mdp = $_POST['mdp'];
		$c_mdp = $_POST['c_mdp'];
		$profil = $_FILES['profil'];

	

		if ($pseudo == '') {
			sendErreur('Veuillez entrez un pseudo');
		}


		if (existpseudoClient($cnx, $pseudo)) {
			sendErreur('Ce pseudo existe déjà !');
		}


		if ($first_name == '') {
			sendErreur('Veuillez entrer un prenom');
		}

		if ($last_name == '') {
			sendErreur('Veuillez entrer un nom');
		}

		if ($email == '') {
			sendErreur('Veuillez entrer un email');
		}

		if (existEmailClient($cnx, $email)) {
			sendErreur('Cette adresse email existe déjà !');
		}


		if ($ville == '') {
			sendErreur('Veuillez entrer une ville');
		}



		if ($adresse == '') {
			sendErreur('Veuillez entrer une adresse');
		}

		if ($c_p == '') {
			sendErreur('Veuillez entrer une ville');
		}

		if ($telephone == '') {
			sendErreur('Veuillez entrer un telephone');
		}

		if ($ddn == '') {
			sendErreur('Veuillez entrer une date de naissance');
		}

		if ($profession == '') {
			sendErreur('Veuillez entrer un nom');
		}

		if ($mdp == '') {
			sendErreur('Veuillez entrer un mot de passe');
		}

		if ($mdp != $c_mdp) {
			sendErreur('Les mots de passe ne sont pas identiques');
		}

		if ($profil == '') {
			sendErreur('Veuillez entrer votre photo de profil');
		}


		if (isset($_FILES) && !empty($_FILES['profil']['name'])) {
			$tailleMax = 2097152;
			$extensionsValides = array('jpg', 'jpeg', 'png');
			if ($_FILES['profil']['size'] <= $tailleMax) {
				$extensionsUpload = strtolower(substr(strrchr($_FILES['profil']['name'], '.'), 1));
				if (in_array($extensionsUpload, $extensionsValides)) {
					$track = "../Membres/PhotoProfilClient/".genererChaineAleatoire().'.'.$extensionsUpload;
					$result = move_uploaded_file($_FILES['profil']['tmp_name'], $track);
				}
				else{
					sendErreur('Votre photo de profil doit avoir une format jpg, jpeg ou png');
				}
			}
			else{
				sendErreur('Votre photo ne doit pas dépasser 2Mo');
			}
		}
 
	}
	if ($pseudo != '' && $first_name != '' && $last_name != '' && $email != '' && $ville != '' && $adresse != '' && $c_p != '' && $telephone != '' && $ddn != '' && $profession != '' && $mdp != '' && $mdp == $c_mdp && existEmailClient($cnx, $email) == NULL && existpseudoClient($cnx, $email) == NULL && $track) {
			$id = addClient($cnx, $pseudo, $first_name, $last_name, $ddn, $email, $ville, $adresse, $c_p, $telephone, $profession, $mdp, $track);
			$_SESSION["id"] = $id;
			$_SESSION["status"] = 'client';
			header('location: profilClient.php');
		}
?>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/inscription.css" type="text/css" media="screen">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>
</head>


		
		<form action='/views/inscriptionClient.php' method='POST' class="boite" enctype="multipart/form-data">
			<h1>Client</h1>

			<div class="form-group">
			    <label for="pseudo"></label>
			    <input type="username" class="form-control" id="first_name" placeholder="Pseudo" name='pseudo'>
			</div>

			<div class="form-group">
			    <label for="first_name"></label>
			    <input type="text" class="form-control" id="first_name" placeholder="Penom" name='first_name'>
			</div>

			<div class="form-group">
			    <label for="last_name"></label>
			    <input type="text" class="form-control" id="last_name" placeholder="Nom" name='last_name'>
			</div>

			<div class="form-group">
			    <label for="ddn"></label>
			    <input type="date" class="form-control" id="ddn" placeholder="mm/dd/yyyy" name='ddn'>
			</div>


			<div class="form-group">
			    <label for="email"></label>
			    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name='email'>
			</div>

			<div class="form-group">
	            <label for="ville"></label>
	            <input id="ville" name="ville" type="text" placeholder="Ville" class="form-control" />
	        </div> 

			<div class="form-group">
	            <label for="adresse"></label>
	            <input id="adresse" name="adresse" type="text" placeholder="Adresse" class="form-control" />
	        </div>    
	          
	        <div class="form-group">    
	            <label for="c_p"></label>
	            <input type = "text" id="c_p" class="form-control" placeholder="Code Postal" name="c_p" />
			</div>

			<div class="form-group">
			    <label for="telephone"></label>
			    <input type="tel" class="form-control" id="telephone" placeholder="Téléphone" name='telephone'>
			</div>

			
			<div class="form-group">
			    <label for="profession"></label>
			    <input type="text" class="form-control" id="profession" placeholder="Profession" name='profession'>
			</div>

			<div class="form-group">
			    <label for="mdp"></label>
			    <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name='mdp'>
			</div>

			<div class="form-group">
			    <label for="c_mdp"></label>
			    <input type="password" class="form-control" id="c_mdp" placeholder="Mot de passe" name='c_mdp'>
			</div>
			
			<label> </label>
			<input type="file" placeholder="Photo de profil" name="profil">

			<button type='submit'>S'inscrire</button>
		</form>
	
