<?php


	function addClient($cnx, $pseudo,$prenom, $nom, $ddn, $email, $ville,  $adresse, $c_p, $telephone, $profession, $mdp, $profil) {
		requete($cnx, "INSERT INTO Client(pseudo, prenom, nom,  date_de_naissance, email, ville, adresse, code_postal, telephone, profession, mot_de_passe, profil) VALUES('$pseudo', '$prenom', '$nom', '$ddn', '$email', '$ville', '$adresse', $c_p, '$telephone', '$profession', '$mdp', '$profil')");
		return mysqli_fetch_object(requete($cnx, "SELECT id FROM Client WHERE email = '$email' AND mot_de_passe = '$mdp'"))->id;
	}

	function selectAllClient ($cnx) {
		$res = requete($cnx, "SELECT * FROM Client");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function connectClient ($cnx, $email, $mdp) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Client WHERE email = '$email' AND mot_de_passe = '$mdp'"));
	}

	function existpseudoClient($cnx, $pseudo) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Client WHERE pseudo = '$pseudo'"));
	}


	function existEmailClient($cnx, $email) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Client WHERE email = '$email'"));
	}

	


	function getClientById ($cnx, $id) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Client WHERE id = $id"));
	}


	function validerClient($cnx, $id){
		requete($cnx, "UPDATE Client SET estValide = 1 WHERE id = $id");
	}

	function supprimerClient($cnx, $id){
		requete($cnx, "DELETE FROM Client WHERE id = $id");
	}

	function selectClientsValide ($cnx) {
		$res = requete($cnx, "SELECT * FROM Client WHERE estValide = 1");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function selectClientsPasValide ($cnx) {
		$res = requete($cnx, "SELECT * FROM Client WHERE estValide = 0");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function updateClientById ($cnx, $id, $pseudo, $prenom, $nom, $ddn, $email, $ville, $adresse, $c_p, $telephone, $profession, $mdp){
		requete($cnx, "UPDATE Client SET pseudo = '$pseudo', prenom = '$prenom', nom = '$nom', date_de_naissance = '$ddn', email = '$email', ville = '$ville', adresse = '$adresse', code_postal = '$c_p', telephone = '$telephone', profession = '$profession',   mot_de_passe = '$mdp' WHERE id = $id");
	}


?>