<?php include '../php/debutPage.php'; ?>

<?php
	if (!empty($_POST)) {

		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$ville = $_POST['ville'];
		$adresse = $_POST['adresse'];
		$c_p = $_POST['c_p'];
		$telephone = $_POST['telephone'];
		$ddc = $_POST['ddc'];
		$mdp = $_POST['mdp'];
		$c_mdp = $_POST['c_mdp'];
		$description = $_POST['description'];
		$profil = $_FILES['profil'];

		if ($nom == '') {
			sendErreur('Veuillez entrez un nom');
		}
		if ($email == '') {
			sendErreur('Veuillez entrer un email');
		}

		if (existEmailOrganisme($cnx, $email) != NULL) {
			sendErreur('Cette adresse email existe déjà !');
		}

		if ($ville == '') {
			sendErreur('Veuillez entrer une ville');
		}

		if ($adresse == '') {
			sendErreur('Veuillez entrer une adresse');
		}

		if ($c_p == '') {
			sendErreur('Veuillez entrer un code postal');
		}

		if ($telephone == '') {
			sendErreur('Veuillez entrer un numero de telephone');
		}

		if ($ddc == '') {
			sendErreur('Veuillez entrer une date de création');
		}

		

		if ($mdp == '') {
			sendErreur('Veuillez entrer un mot de passe');
		}

		if ($mdp != $c_mdp) {
			sendErreur('Les mots de passe ne sont pas identiques');
		} 


		if ($description == '') {
			sendErreur('Veuillez entrer une description');
		}

		if (isset($_FILES) && !empty($_FILES['profil']['name'])) {
			$tailleMax = 2097152;
			$extensionsValides = array('jpg', 'jpeg', 'png');
			if ($_FILES['profil']['size'] <= $tailleMax) {
				$extensionsUpload = strtolower(substr(strrchr($_FILES['profil']['name'], '.'), 1));
				if (in_array($extensionsUpload, $extensionsValides)) {
					$track = "../Membres/PhotoProfilOrganisme/".genererChaineAleatoire().'.'.$extensionsUpload;
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



		if (!$track) {
			sendErreur('Veuillez entrer une image');
		}


		if ($nom != '' && $email != '' && $ville != '' && $adresse != '' && $c_p != '' && $telephone != '' && $ddc != '' &&  $mdp != '' && $mdp == $c_mdp && $description != '' && existEmailOrganisme($cnx, $email) == NULL && $track) {
			$id = addOrganisme($cnx, $nom, $email, $ville, $adresse, $c_p, $telephone, $ddc, $mdp, $description, $track);
			$_SESSION["id"] = $id;
			$_SESSION["status"] = 'organisme';
			header('Location: profilOrganisme.php');
		}
	}
?>

<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../css/inscription.css" type="text/css" media="screen">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>
</head>

<div class=''>
	<div class=''>
		
		<form action='/views/inscriptionOrganisme.php' method='POST' class="boite" enctype="multipart/form-data">
			<h1>Organisme</h1>
			<div class="form-group">
			    <label for="nom"></label>
			    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name='nom'>
			</div>

			<div class="form-group">
			    <label for="email"></label>
			    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name='email'>
			</div>

			<div class="form-group">
			    <label for="ville"></label>
			    <input type="text" class="form-control" id="ville" placeholder="Entrez votre ville" name='ville'>
			</div>

			<div class="form-group">
			    <label for="adresse"></label>
			    <input type="text" class="form-control" id="adresse" placeholder="Entrez votre adresse" name='adresse'>
			</div>

			<div class="form-group">
			    <label for="telephone"></label>
			    <input type="text" class="form-control" id="telephone" placeholder="Entrez votre telephone" name='telephone'>
			</div>

			<div class="form-group">
			    <label for="ddc"></label>
			    <input type="date" class="form-control" id="ddc" placeholder="Entrez la date de création de votre organisme" name='ddc'>
			</div>



			<div class="form-group">
			    <label for="mdp"></label>
			    <input type="password" class="form-control" id="mdp" placeholder="Mot de passe" name='mdp'>
			</div>

			<div class="form-group">
			    <label for="c_mdp"></label>
			    <input type="password" class="form-control" id="c_mdp" placeholder="Mot de passe" name='c_mdp'>
			</div>

			<div class="form-group">
			    <label for="description"></label>
			    <input type="text" class="form-control" id="description" placeholder="Description" name='description'>
			</div>

			<label> </label>
			<input type="file" placeholder="Photo de profil" name="profil">

			<input  type='submit' placeholder="S'inscrire">
		</form>
	</div>
</div>

