<?php include '../php/debutPage.php'; ?>

<?php
	
	if (!isAdmin()) {
		error404();
	}

	$id = $_POST['id'];
	supprimerFormation($cnx,$id);
	echo("ok");
?>


<?php include '../php/finPage.php'; ?>