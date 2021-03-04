<?php include '../php/debutPage.php'; ?>

<?php
	
	
	
	if (!isAdmin() && $utilisateur->type != "administrateur"){
		error404();
	}
	

	$admin = getAdminConnected($cnx);

?>

<link rel="stylesheet" href="../css/profil.css" type="text/css">
<link rel="stylesheet" href="../css/ajouterFormation.css" type="text/css">
        <script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>

<div class="box1">
    <img class='box-img' src='https://t3.ftcdn.net/jpg/01/75/91/84/240_F_175918488_wkuz1qNqDlsWYhfsHdQAmV23SNmkj3vV.jpg'>

	<h1 class='text-center w-100 display-4'>
		<?php echo "$client->prenom $client->nom"?>
	</h1></br>
		<i class="fas fa-phone"></i><?php echo " $client->telephone"?>
		<i class="fas fa-envelope"></i> <?php echo $client->email ?></br>
	<div class="contact">	
	 	<ul>
	 		<li><i class="far fa-user"></i><?php echo "$admin->nom $admin->prenom" ?></li>
		 		<li><i class="fas fa-phone"></i><?php echo $admin->telephone ?></li></br>
		 		 <li><i class="fas fa-envelope"></i> <?php echo $admin->email ?></li></br>
	 		 <li><?php echo $admin->type ?></li></br>
	 		 
	 	</ul>
</div>

<!-- <div class="box1">
       <img class='box-img' src='https://t3.ftcdn.net/jpg/01/75/91/84/240_F_175918488_wkuz1qNqDlsWYhfsHdQAmV23SNmkj3vV.jpg'>

		<h1 class='text-center w-100 display-4'>
			<?php echo $client->nom ?>
		</h1>
	    <div class="contact">	
		 	<ul>

		 	     <li><i class="far fa-user"></i><?php echo "$admin->nom $admin->prenom" ?></li>
		 		<li><i class="fas fa-phone"></i><?php echo $admin->telephone ?></li></br>
		 		 <li><i class="fas fa-envelope"></i> <?php echo $admin->email ?></li></br>
		 		 <li><?php echo $admin->type ?></li>
		 		 <li></li>
		 	</ul>
</div> -->
	

<div class='container'>
	<button class='btn btn-warning' onclick='showModif()'>Modifier</button>


	<div class='row mt-3' id='ModifierForm' style='display: none'>
		<div class='col-6'>
			<form action='/views/profilAdmin.php' method='POST' enctype="multipart/form-data">
				<div class="form-group">
				    <label for="last_name"></label>
				    <input type="text" class="form-control" id="last_name" placeholder="Entrez votre nom" name='last_name' value ="<?php echo $admin->nom ?>">
				</div>

				<div class="form-group">
				    <label for="firt_name"></label>
				    <input type="text" class="form-control" id="first_name" placeholder="Entrez votre nom" name='first_name' value ="<?php echo $admin->prenom ?>">
				</div>

				<div class="form-group">
				    <label for="email"></label>
				    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name='email' value ="<?php echo $admin->email ?>">
				</div>


				<div class="form-group">
				    <label for="telephone"></label>
				    <input type="text" class="form-control" id="telephone" placeholder="Entrez votre telephone" name='telephone' value ="<?php echo $admin->telephone ?>">
				</div>

				<div class="form-group">
				    <label for="type"></label>
				    <input type="text" class="form-control" id="type" placeholder="Entrez le type" name='type' value ="<?php echo $admin->type ?>">
				</div>
				<div class="form-group">
				    <label for="mdp"></label>
				    <input type="password" class="form-control" id="mdp" placeholder="Entrez le mot de passe" name='mdp' value ="<?php echo $admin->mot_de_passe ?>">
				</div>


				<button type='submit' class='btn btn-warning'>Submit</button>
			</form>
		</div>
	</div>
</div>

	<?php

	if (isset($_POST['name'])) {
		$id = $_SESSION['id'];
		$nom = $_POST['last_name'];
		$prenom = $_POST['first_name'];
		$email = $_POST['email'];
		$telephone = $_POST['telephone'];
		$type = $_POST['type'];
		$mdp = $_POST['mdp'];

		updateAdminById ($cnx, $id, $nom, $prenom, $email, $telephone, $type, $mdp);
		echo '<meta http-equiv="refresh" content="0;URL=profilAdmin.php">';

	}

	?>


	<script type="text/javascript">
		function showModif() {
			document.getElementById('ModifierForm').style.display = document.getElementById('ModifierForm').style.display == 'none' ? 'block' : 'none';
		}
	</script>


<?php include '../php/finPage.php'; ?>