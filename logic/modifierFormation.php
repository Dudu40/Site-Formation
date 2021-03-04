<?php include '../php/debutPage.php'; ?>

<?php
	
	if (!isAdmin) {
		error404();
	}

	$id = $_POST['id'];
	updateFormationById ($cnx, $id, $nom, $cout, $duree, $adresse,  $domaine, $diplome, $pre_requis, $perspectives, $description);
?>


<?php include '../php/finPage.php'; ?>