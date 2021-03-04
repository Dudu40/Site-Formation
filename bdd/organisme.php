<?php
	
	
	
	function addOrganisme ($cnx, $nom, $email,$ville, $adresse, $c_p, $telephone, $ddc, $mdp, $description, $profil) {
		requete($cnx, "INSERT INTO Organisme(nom, email, ville, adresse, code_postal, telephone, date_de_creation, estValide, mot_de_passe, description, profil) VALUES('$nom', '$email', '$ville', '$adresse', '$c_p', '$telephone', '$ddc', 0, '$mdp', '$description', '$profil')");
		return mysqli_fetch_object(requete($cnx, "SELECT id FROM Organisme WHERE email = '$email' AND mot_de_passe = '$mdp'"))->id;
	}

	function selectAllOrganisme ($cnx) {
		$res = requete($cnx, "SELECT * FROM Organisme");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function connectOrganisme ($cnx, $email, $mdp) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Organisme WHERE email = '$email' AND mot_de_passe = '$mdp'"));
	}

	function existEmailOrganisme($cnx, $email) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Organisme WHERE email = '$email'"));
	}

	function getOrganismeById ($cnx, $id) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Organisme WHERE id = $id"));
	}


	function validerOrganisme($cnx, $id){
		requete($cnx, "UPDATE Organisme SET estValide = 1 WHERE id = $id");
	}

	function supprimerOrganisme($cnx, $id){
		requete($cnx, "DELETE FROM Organisme WHERE id = $id");
	}

	function selectOrganismesValide ($cnx) {
		$res = requete($cnx, "SELECT * FROM Organisme WHERE estValide = 1");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function selectOrganismesPasValide ($cnx) {
		$res = requete($cnx, "SELECT * FROM Organisme WHERE estValide = 0");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}


	function updateOrganismeById ($cnx, $id, $nom, $email, $ville, $adresse, $c_p, $telephone, $mdp, $description){
		requete($cnx, "UPDATE Organisme SET nom = '$nom', email = '$email', ville = '$ville', adresse = '$adresse', code_postal = '$c_p', telephone = '$telephone', mot_de_passe = '$mdp', description = '$description', WHERE id = $id");
	}

?>