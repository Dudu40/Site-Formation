<?php

	function error404 () {
		header('HTTP/1.0 404 Not Found');
		exit();
	}

	function isAuth () {
		return !empty($_SESSION['id']);
	}

	function isClient () {
		return $_SESSION['status'] == 'client';
	}

	function isOrganisme () {
		return $_SESSION['status'] == 'organisme';
	}

	function isAdmin () {
		return $_SESSION['status'] == 'admin';
	}

	function getClientConnected ($cnx) {
		return getClientById($cnx, $_SESSION['id']);
	}

	function getOrganismeConnected ($cnx) {
		return getOrganismeById($cnx, $_SESSION['id']);
	}

	function getAdminConnected ($cnx) {
		return getAdminById($cnx, $_SESSION['id']);
	}

	function sendErreur ($msg) {
		echo "<div class='alert alert-danger' role='alert'>$msg</div>" ;
	}

	function sendSucess ($msg) {
		echo "<div class='alert alert-success' role='alert'>$msg</div>";
	}

	function genererChaineAleatoire($longueur = 10) {
	 	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	 	$longueurMax = strlen($caracteres);
	 	$chaineAleatoire = '';
	 	for ($i = 0; $i < $longueur; $i++) {
	 		$chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
	 	}
	 	return $chaineAleatoire;
	}

	function formationAppartientA($formation) {
		global $cnx;
		$formations = selectFormationsByIdOrganisme($cnx, $_SESSION['id']);
		$formations = array_map(function ($el) {
			global $cnx;
			return $el['id'];
		}, $formations);
		return in_array($formation->id, $formations);
	}
?>
