<?php include '../php/debutPage.php'; ?>

<?php
	

	$id_formation = $_POST['id_formation'];
	deleteFormationInscrit($cnx, $id_formation, $_SESSION['id']);
?>


<?php include '../php/finPage.php'; ?>