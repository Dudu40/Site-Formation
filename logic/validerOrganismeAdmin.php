<?php include '../php/debutPage.php'; ?>

<?php
	
	if (!isAdmin()) {
		error404();
	}
	

	$id = $_POST['id'];
	validerOrganisme($cnx, $id);
?>


<?php include '../php/finPage.php'; ?>