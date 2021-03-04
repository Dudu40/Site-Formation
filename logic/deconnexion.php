<?php 
	include '../php/debutPage.php';

	unset($_SESSION['id']);
	unset($_SESSION['status']);

	header('Location: ../views/accueil.php');

	include '../php/finPage.php'; 
 ?>