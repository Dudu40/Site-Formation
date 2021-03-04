<?php include '../php/debutPage.php'; ?>

<?php

	if (isClient()) {
		error404();
	}


	$organisme = getOrganismeConnected($cnx);
	$formations = selectFormationsByIdOrganisme($cnx, $_SESSION['id']);

?>

<link rel="stylesheet" href="../css/profil.css" type="text/css">
<link rel="stylesheet" href="../css/ajouterFormation.css" type="text/css">



<div class="box1">
    <img class="box-img" src='<?php echo $organisme->profil ?>'> 

	<h1 class='text-center w-100 display-4'>
		<?php echo $organisme->nom ?>
	</h1></br>
		<i class="fas fa-phone"></i><?php echo $organisme->téléphone ?>  
		<i class="fas fa-envelope"></i> <?php echo $organisme->email ?></li></br>
	<div class="contact">	
	 	<ul>
	 		<li><?php echo $organisme->ville ?></li></br>
	 		 <li><?php echo "$organisme->adresse  $organisme->c_p" ?></li></br>
	 		 <li><?php echo $organisme->date_de_creation?></li></br>
	 		 <li><?php echo $organisme->description ?></li></br>
	 	</ul>
</div>
	


	<div class='container'>
		<button class='btn btn-warning' onclick='showModif()'>Modifier</button>

	
		<div class='row mt-3' id='ModifierForm' style='display: none'>
			<div class='col-6'>
				<form action='/views/profilOrganisme.php' method='POST' enctype="multipart/form-data">
					<div class="form-group">
					    <label for="nom">Nom</label>
					    <input type="text" class="form-control" id="nom" placeholder="Entrez votre nom" name='nom' value ="<?php echo $organisme->nom ?>">
					</div>

					<div class="form-group">
					    <label for="email">Email</label>
					    <input type="email" class="form-control" id="email" placeholder="Entrez votre email" name='email' value ="<?php echo $organisme->email ?>">
					</div>

					<div class="form-group">
					    <label for="ville">Ville</label>
					    <input type="text" class="form-control" id="email" placeholder="Entrez votre ville" name='ville' value ="<?php echo $organisme->ville ?>">
					</div>


					<div class="form-group">
					    <label for="adresse">Adresse</label>
					    <input type="adresse" class="form-control" id="adresse" placeholder="Entrez votre adresse" name='adresse' value ="<?php echo $organisme->adresse ?>">
					</div>

					<div class="form-group">
					    <label for="c_p">Code Postal</label>
					    <input type="number" class="form-control" id="c_p" placeholder="Entrez votre code postal" name='c_p' value ="<?php echo $organisme->code_postal ?>">
					</div>

					<div class="form-group">
					    <label for="Telephone">Telephone</label>
					    <input type="text" class="form-control" id="telephone" placeholder="Entrez votre telephone" name='telephone' value ="<?php echo $organisme->telephone ?>">
					</div>

					<div class="form-group">
					    <label for="mdp">Mot de passe</label>
					    <input type="password" class="form-control" id="mdp" placeholder="Entrez votre mot de passe" name='mdp' value ="<?php echo $organisme->mot_de_passe ?>">
					</div>
					<div class="form-group">
					    <label for="c_mdp">Confirmez votre mot de passe</label>
					    <input type="password" class="form-control" id="c_mdp" placeholder="Entrez votre mot de passe" name='c_mdp' value ="<?php echo $organisme->mot_de_passe ?>">
					</div>

					<div class="form-group">
					    <label for="description">Description</label>
					    <input type="text" class="form-control" id="c_p" placeholder="Entrez votre code postal" name='description' value ="<?php echo $organisme->description ?>">
					</div>

					<button type='submit' class='btn btn-warning'>Submit</button>
				</form>
			</div>
		</div>
	</div>

	<?php

	if (isset($_POST['name'])) {
		$id = $_SESSION['id'];
		$nom = $_POST['nom'];
		$email = $_POST['email'];
		$ville = $_POST['ville'];
		$adresse = $_POST['adresse'];
		$c_p = $_POST['c_p'];
		$telephone = $_POST['telephone'];
		$mdp = $_POST['mdp'];
		$c_mdp = $_POST['c_mdp'];
		$description = $_POST['description'];

		if ($mdp != $c_mdp) {
			sendErreur("Veuillez saisir un mot de passe identique");
		}

		updateOrganismeById ($cnx, $id, $nom, $email, $ville, $adresse, $c_p, $telephone, $mdp, $description);
		echo '<meta http-equiv="refresh" content="0;URL=profilOrganisme.php">';
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
	   	<h2><?php echo $formation['nom'] ?></h2>
	   	
      <ul>
      	<li><?php echo $formation['cout'] ?></li></br>
      	<li><a href='infoFormation.php?id=<?php echo $formation['id'] ?>'>
			<button type='submit' class='btn btn-warning'>
		Modifier</button></a></li>
      	<li><a href="profilOrganisme.php"><button type="button" id='ref_<?php echo $formation['id']?>' class="btn btn-warning" onclick='refuser(this, <?php echo $formation['id'] ?>)'>Supprimer</button></a></li>
      	
      </ul>
    
      </div>
    </div>
	<?php } ?>
</div>

		
	<div class='row'>
		<div class='text-center w-100 display-4'>
			<br>Mes formations
		</div>
	</div>

	<div class='container'>
		<table class="table">
	    	<thead>
	    		<tr>
	      			<th scope="col">Nom</th>
	      			<th scope="col">Coût</th>
	      			<th scope="col"></th>
	      			<th scope='col'></th>
	    		</tr>
	  		</thead>
	  		<tbody>
	  			<?php foreach($formations as $formation) { ?>
	  				<tr>
					    <td><?php echo $formation['nom'] ?></td>
					    <td><?php echo $formation['cout'] ?></td>
					    <td><a href='infoFormation.php?id=<?php echo $formation['id'] ?>'>
					    	<button type='submit' class='btn btn-warning'>
					    		Modifier
							</button></a>
						</td>

					    <td><a href="profilOrganisme.php"><button type="button" id='ref_<?php echo $formation['id']?>' class="btn btn-danger" onclick='refuser(this, <?php $formation['id'] ?>)'>Supprimer</button></a></td>
				    </tr>
				<?php } ?>
	  		</tbody>
	  	</table>
	  </div>
</div>

<script type="text/javascript">
	function refuser(button, id) {
		ajax('../logic/refuserFormation.php', 'id=' + id, function(res) {
			document.getElementById("tr_" + id).style.display = 'none';
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