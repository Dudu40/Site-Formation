<?php



	function addClientFormation($cnx, $id_formation, $id_client) {
		requete($cnx, "INSERT INTO Client_Formation(id_formation, id_client) VALUES($id_formation, $id_client)");
	}

	function supClientFormation($cnx, $id_formation, $id_client) {
		requete($cnx, "DELETE FROM Client_Formation WHERE id_formation = $id_formation AND id_client = $id_client");
	}


	function selectClientFormationByIdClient ($cnx, $id_client) {
		$res = requete($cnx, "SELECT * FROM Client_Formation WHERE id_client = $id_client");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function selectClientFormationByIdFormation ($cnx, $id_formation) {
		$res = requete($cnx, "SELECT * FROM Client_Formation WHERE id_formation = $id_formation");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function existClientFormation ($cnx, $id_formation, $id_client) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Client_Formation WHERE id_formation = $id_formation AND id_client = $id_client"));
	}

	function selectFormationsInscrit ($cnx, $id_client) {
		$res = requete($cnx, "SELECT * FROM Client_Formation WHERE id_client = $id_client");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function deleteFormationInscrit ($cnx, $id_formation, $id_client) {
		requete($cnx, "DELETE FROM Client_Formation WHERE id_client = $id_client AND id_formation = $id_formation");
	}

?>