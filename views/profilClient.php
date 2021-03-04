<?php include '../php/debutPage.php'; ?>

<?php
	
	
	
	if (isOrganisme()) {
		error404();
	}
	

	$client = getClientConnected($cnx);
	$formations = selectFormationsInscrit($cnx, $_SESSION['id']);

	$formations = array_map(function ($el) {
		global $cnx;
		$id = $el['id_formation'];
		return getFormationById ($cnx, $id);
	}, $formations);

?>

<link rel="stylesheet" href="../css/profil.css" type="text/css">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>

<div class="box1">
    <img class="box-img" src='<?php echo $client->profil ?>'> 

	<h1 class='text-center w-100 display-4'>
		<?php echo "$client->prenom $client->nom"?>
	</h1></br>
		<i class="fas fa-phone"></i><?php echo " $client->telephone"?>
		<i class="fas fa-envelope"></i> <?php echo $client->email ?></br>
	<div class="contact">	
	 	<ul>
	 		<li><?php echo $client->ville ?></li></br>
	 		 <li><?php echo "$client->adresse  $client->c_p" ?></li></br>
	 		 <li><?php echo $client->date_de_naissance ?></li></br>
	 		 <li><?php echo $client->profession ?></li></br>
	 	</ul>
</div>

	<div class='container'>
		<button class='btn btn-warning' onclick='showModif()'>Modifier</button>

	
		<div class='row mt-3' id='ModifierForm' style='display: none'>
			<div class='col-6'>
				<form action='/views/profilClient.php' method='POST' enctype="multipart/form-data">
					<div class="form-group">
					    <label for="pseudo">Pseudonyme</label>
					    <input type="text" class="form-control" id="pseudo" placeholder="Entrez votre pseudo" name='pseudo' value ="<?php echo $client->pseudo ?>">
					</div>

					<div class="form-group">
					    <label for="first_name">Prenom</label>
					    <input type="text" class="form-control" id="first_name" placeholder="Entrez votre prenom" name='first_name' value ="<?php echo $client->prenom ?>">
					</div>

					div class="form-group">
				    <label for="last_name">Nom</label>
				    <input type="text" class="form-control" id="last_name" placeholder="Entrez votre nom" name='last_name' value ="<?php echo $client->nom ?>">
				</div>

				<div class="form-group">
				    <label for="ddn">Date de naissance</label>
				    <input type="date" class="form-control" id="ddn" placeholder="Entrez votre date de naissance" name='ddn' value ="<?php echo $client->date_de_naissance ?>">
				</div>

				<div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name='email' value ="<?php echo $client->email ?>">
				</div>

				<div class="form-group">
				    <label for="ville">Ville</label>
				    <input type="text" class="form-control" id="ville" placeholder="Entrez votre ville" name='ville' value ="<?php echo $client->ville ?>">
				</div>

				<div class="form-group">
				    <label for="adresse">Adresse</label>
				    <input type="text" class="form-control" id="adresse" placeholder="Entrez votre adresse" name='adresse' value ="<?php echo $client->adresse ?>">
				</div>

				<div class="form-group">
				    <label for="c_p">Code postal</label>
				    <input type="text" class="form-control" id="c_p" placeholder="Entrez votre code postal" name='c_p' value ="<?php echo $client->code_postal ?>">
				</div>

				<div class="form-group">
				    <label for="telephone">Telephone</label>
				    <input type="text" class="form-control" id="telephone" placeholder="Entrez votre telephone" name='telephone' value ="<?php echo $client->telephone ?>">
				</div>

				<div class="form-group">
				    <label for="profession">Profession</label>
				    <input type="text" class="form-control" id="profession" placeholder="Entrez votre profession" name='profession' value ="<?php echo $client->profession ?>">
				</div>

				<div class="form-group">
				    <label for="mdp">Mot de passe</label>
				    <input type="password" class="form-control" id="mdp" placeholder="Entrez votre mot de passe" name='mdp' value ="<?php echo $client->mot_de_passe ?>">
				</div>


				<div class="form-group">
				    <label for="c_mdp">Confirmez votre mot de passe</label>
				    <input type="password" class="form-control" id="c_mdp" placeholder="Entrez votre mot de passe" name='c_mdp' value ="<?php echo $client->mot_de_passe ?>">
				</div>				


					<button type='submit' class='btn btn-warning'>Submit</button>
				</form>
			</div>
		</div>
	</div>

	<?php

	if (isset($_POST['name'])) {
		$id = $_SESSION['id'];
		$pseudo = $_POST['pseudo'];
		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$ddn = $_POST['ddn'];
		$email = $_POST['email'];
		$ville = $_POST['ville'];
		$adresse = $_POST['adresse'];
		$c_p = $_POST['c_p'];
		$telephone = $_POST['telephone'];
		$profession = $_POST['profession'];
		$mdp = $_POST['mdp'];
		$c_mdp = $_POST['c_mdp'];

		updateClientById ($cnx, $id, $pseudo, $prenom, $nom, $ddn, $email, $ville, $adresse, $c_p, $telephone, $profession, $mdp);
		echo '<meta http-equiv="refresh" content="0;URL=profilClient.php">';

	}

	?>


	<script type="text/javascript">
		function showModif() {
			document.getElementById('ModifierForm').style.display = document.getElementById('ModifierForm').style.display == 'none' ? 'block' : 'none';
		}
	</script>

<div class="box2">
	<?php foreach($formations as $formation) { ?>
  <div class="col">
   		<div class="table">
		   	<h2><?php echo $formation->nom ?></h2>
	 		
						<button type="button" class="btn btn-danger" onclick='supprimer(<?php echo $formation->id ?>)'>Je me désinscris</button>
				
		  
		</div>
	</div>
	<?php } ?>
</div>

<!-- <div class="box2">
  <div class="col">
   		<table class="table">
		   	<h2>Mes formations</h2>
	 		<thead>
	    		<tr>
	      			<th scope="col">Nom</th>
	      			<th scope="col"></th>
	    		</tr>
		  	</thead>
	  		<tbody>
	  			<?php foreach($formations as $formation) { ?>
	  				<tr id='tr_<?php echo $formation->id ?>'>
					    <td><?php echo $formation->nom ?></td>
						<td><button type="button" class="btn btn-danger" onclick='supprimer(<?php echo $formation->id ?>)'>Je me désinscris</button></td>
				    </tr>
				<?php } ?>
		  	</tbody>
		</table>
	</div>
</div> -->


<script type="text/javascript">
	function refuser(button, id) {
		ajax('../logic/refuserFormation.php', 'id=' + id, function(res) {
			document.getElementById("tr_" + id).style.display = 'none';
		});
	}

	function supprimer (id_formation) {
		console.log(id_formation);
		ajax('../logic/desinscrireFormation.php', 'id_formation=' + id_formation, function(res) {
			document.getElementById('tr_' + id_formation).style.display = "none";
		});
	}
</script>




<style type="text/css">
	
	.bgImage {
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 400px;
		z-index: -1;
		filter: brightness(0.5);
	}

	.profilImage {
		position: absolute;
		top: 200px;
		left: 50%;
		transform: translate(-50%, 0);
		width: 300px;
		height: 300px;
		z-index: -1;
	}

	.info {
		position: absolute;
		top: 520px;
		width: 100%;
		left: 0px;
	}

</style>



<?php include '../php/finPage.php'; ?>