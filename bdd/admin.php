<?php

	
	function connectAdmin ($cnx, $email, $mdp) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Utilisateur WHERE email = '$email' AND mot_de_passe = '$mdp'"));
	}

	function getAdminById ($cnx, $id) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Utilisateur WHERE id = $id"));
	}

	function updateAdminById ($cnx, $id, $nom, $prenom, $email, $telephone, $type, $mdp){
		requete($cnx, "UPDATE Utilisateur SET nom = '$nom', prenom = '$prenom', email = '$email', telephone = '$telephone', type = '$type', mot_de_passe = '$mdp' WHERE id = $id");
	}


	function selectAllUtilisateur($cnx) {
		$res = requete($cnx, "SELECT * FROM Utilisateur");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

?>