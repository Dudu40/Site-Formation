<?php include '../php/debutPage.php'; ?>
	
<?php
	$formations = selectAllFormation ($cnx);
?>


<!DOCTYPE html>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ContactUS</title>
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
	<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="container">
		<div class="contact-methode">
		<i class="fas fa-at"></i>
		<span><a href="mailto:contact@raeda.com"> contact@raeda.com </a></span>
        </div>
		<div class="contact-methode">
		<i class="fas fa-phone"></i>
		<span><a href="tel:+33615652398"> 0615652398 </a></span>
        </div>
		<div class="contact-methode">
		<i class="fas fa-map-pin"></i>
		<span>3 Avenue Jean Jaurès, Ivry sur
			Seine</span>
		</div>
	</div>


</body>
</html>

<?php include '../php/finPage.php'; ?>