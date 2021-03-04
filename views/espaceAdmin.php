<?php include '../php/debutPage.php'; ?>

<?php

if (!isAdmin() && $utilisateur->type != "administrateur") {
	error404();
}
	$utilisateurs = selectAllUtilisateur($cnx);
?>

<!-- <link rel="stylesheet" href="../css/toutesFormations.css" type="text/css" media="screen"> -->
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, iniatial-scale=1">

	<div class="pricing-table">
<?php foreach($utilisateurs as $utilisateur) { ?>


	<div class="col">
	   <div class="table">
	   	<ul>
	   	<li><?php echo $utilisateur['nom'] ?></li>
      	<li><?php echo $utilisateur['email'] ?></li>
      	<li><?php echo $utilisateur['type'] ?></li>
      	<li><?php echo $utilisateur['mot_de_passe'] ?></li>
      	</ul>
      </div>
     <a class="btn">
		    	Modifier<span class="sr-only">(current)</span>
		    </a>
      </div>
    </div>


<?php } ?> 


<?php include '../php/finPage.php'; ?>