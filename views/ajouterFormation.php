<?php include '../php/debutPage.php'; ?>

<?php


	
	if (!isOrganisme()) {
		error404();
	}


	if (!empty($_POST)) {


		$nom = $_POST['nom'];
		$cout = $_POST['cout'];
		$duree = $_POST['duree'];
		$adresse = $_POST['adresse'];
		$domaine = $_POST['domaine'];
		$diplome = $_POST['diplome'];
		$pre_requis = $_POST['pre_requis'];
		$perspectives = $_POST['perspectives'];
		$description = $_POST['description'];
		$estValide = getOrganismeById($cnx, $_SESSION['id'])->estValide;


		if ($nom == '') {
			sendErreur('Veuillez entrer un nom');
		}
		if ($cout == '') {
			sendErreur('Veuillez entrer le cout');
		} 

		if ($duree == '') {
			sendErreur('Veuillez entrer la duree');
		}

		if ($adresse == '') {
			sendErreur('Veuillez entrer le adresse');
		} 

		if ($domaine == '') {
			sendErreur('Veuillez entrer le domaine');
		} 

		if ($diplome == '') {
			sendErreur('Veuillez entrer le diplome');
		} 

		if ($pre_requis == '') {
			sendErreur('Veuillez entrer les pre_requis');
		} 

		if ($perspectives == '') {
			sendErreur('Veuillez entrer les perspectives');
		} 

		if ($description == '') {
			sendErreur('Veuillez entrer une description');
		} 
		

		if ($nom != '' && $cout != '' && $duree != '' && $adresse != '' && $domaine != '' && $diplome != '' &&  $pre_requis != '' && $perspectives != '' && $description != '') {

			addFormation($cnx, $_SESSION["id"], $nom, $cout, $duree, $adresse, $domaine, $diplome, $pre_requis, $perspectives, $description, $estValide);
			sendSucess('La formation a été ajoutée avec succès');
		}
	}

?>


<link rel="stylesheet" href="../css/ajouterFormation.css" type="text/css" media="screen">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>

<div class='row mt-3'>
	<div class='col-12'>
		<h1>Ajouter une formation</h1>
		<form action='/views/ajouterFormation.php' method='POST'>
			<div class="form-group">
			    <label for="nom"></label>
			    <input type="text" class="form-control" id="nom" placeholder="Entrez le nom de la formation" name='nom'>
			</div>

			<div class="form-group">
			    <label for="cout"></label>
			    <input type="number" class="form-control" id="cout" placeholder="Entrez le coût de la formation" name='cout'>
			</div>

			<div class="form-group">
			    <label for="duree"></label>
			    <input type="text" class="form-control" id="duree" placeholder="Entrez la duree de la formation" name='duree'>
			</div>

			<div class="form-group">
			    <label for="adresse"></label>
			    <input type="text" class="form-control" id="adresse" placeholder="Entrez l adresse de la formation" name='adresse'>
			</div>


			<div class="form-group">
			    <label for="domaine"></label>
			    <input type="text" class="form-control" id="domaine" placeholder="Entrez le domaine de la formation" name='domaine'>
			</div>


			<div class="form-group">
			    <label for="diplome"></label>
			    <input type="text" class="form-control" id="diplome" placeholder="Entrez le diplome de la formation" name='diplome'>
			</div>


			<div class="form-group">
			    <label for="pre_requis"></label>
			    <input type="text" class="form-control" id="pre_requis" placeholder="Entrez les pre_requis de la formation" name='pre_requis'>
			</div>


			<div class="form-group">
			    <label for="perspectives"></label>
			    <input type="text" class="form-control" id="perspectives" placeholder="Entrez les perspectives de la formation" name='perspectives'>
			</div>


			<div class="form-group">
			    <label for="description"></label>
			    <input type="text" class="form-control" id="description" placeholder="Entrez une description" name='description'>
			</div>

	        <button type='submit' class="btn btn-primary">Ajouter</button> 
		</form>
	</div>
</div>

<?php include '../php/finPage.php'; ?>