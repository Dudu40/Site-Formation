
<?php


	function addFormation ($cnx, $id_organisme, $nom, $cout, $duree, $adresse, $domaine, $diplome, $pre_requis, $perspectives, $description, $estValide) {
		requete($cnx, "INSERT INTO Formation(id_organisme, nom, cout, duree, adresse, domaine, diplome, pre_requis, perspectives, description, estValide) VALUES($id_organisme, '$nom', $cout, '$duree', '$adresse', '$domaine', '$diplome', '$pre_requis', '$perspectives', '$description', $estValide)");
	}


	function selectAllFormation ($cnx) {
		$res = requete($cnx, "SELECT * FROM Formation");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function selectFormationsByIdOrganisme ($cnx, $id_organisme) {
		$res = requete($cnx, "SELECT * FROM Formation WHERE id_organisme = $id_organisme");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function getFormationById ($cnx, $id) {
		return mysqli_fetch_object(requete($cnx, "SELECT * FROM Formation WHERE id = $id"));
	}

	function validerFormation($cnx, $id){
		requete($cnx, "UPDATE Formation SET estValide = 1 WHERE id = $id");
	}

	function supprimerFormation($cnx, $id){
		requete($cnx, "DELETE FROM Formation WHERE id = $id");
	}

	function selectFormationsValide ($cnx) {
		$res = requete($cnx, "SELECT * FROM Formation WHERE estValide = 1");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function selectFormationsPasValide ($cnx) {
		$res = requete($cnx, "SELECT * FROM Formation WHERE estValide = 0");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function searchFormations ($cnx, $nom, $adresse, $domaine, $diplome) {
		$res = requete($cnx, "SELECT * FROM Formation WHERE estValide = 1 AND nom LIKE '%$nom%' AND adresse LIKE '%$adresse%' AND domaine LIKE '%$domaine%' AND diplome LIKE '%$diplome%'");
		$array = array();
		while ($line = mysqli_fetch_assoc($res)) {
			array_push($array, $line);
		}
		return $array;
	}

	function updateFormationById ($cnx, $id, $nom, $cout, $duree, $adresse,  $domaine, $diplome, $pre_requis, $perspectives, $description) {
		requete($cnx, "UPDATE Formation SET nom = '$nom', cout = $cout, duree = $duree, adresse = $adresse, domaine = '$domaine', pre_requis = '$pre_requis', perspectives = '$perspectives', description = '$description' WHERE id = $id ");
	}


?>
