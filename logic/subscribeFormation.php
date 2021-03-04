<?php

	


	include '../bdd/bdd.php';
	include '../bdd/client_formation.php';
	session_start();
	$cnx = connectBDD();

	$id_client = $_POST['id_client'];
	$id_formation = $_POST['id_formation'];

	if (existClientFormation($cnx, $id_formation, $id_client)) {
		supClientFormation($cnx, $id_formation, $id_client);
		echo "S\'inscrire";
	} else {
		addClientFormation($cnx, $id_formation, $id_client);
		echo "Vous etes inscrit";
	}
	

	disconnectBDD($cnx);
?>

