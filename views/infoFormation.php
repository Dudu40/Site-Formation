<?php include '../php/debutPage.php'; ?>

<?php


	$id = $_GET['id'];

	$formation = getFormationById ($cnx, $id);
	$organisme = getOrganismeById ($cnx, $formation->id_organisme);
?>

<link rel="stylesheet" href="../css/infoFormation.css" type="text/css" media="screen">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, iniatial-scale=1">

   <ul>
	<li><strong>Nom:</strong><?php echo $formation->nom ?></li>
	<li><strong>Coût:</strong><?php echo $formation->cout ?></li>
	<li><strong>Organisme:</strong><?php echo $organisme->nom ?></li>
	<li><strong>Adrese:</strong><?php echo $formation->adresse ?></li>
	<li><strong>Duree:</strong><?php echo $formation->duree ?></li>
	<li><strong>Domaine:</strong><?php echo $formation->domaine ?></li>
	<li><strong>Diplôme:</strong><?php echo $formation->diplome ?></li>
	<li><strong>Pré-requis:</strong><?php echo $formation->pre_requis ?></li>
	<li><strong>Persperctives:</strong><?php echo $formation->persperctives ?></li>
	<li><strong>Description:</strong><?php echo $formation->description ?></li>
</ul>
	
<?php if (isClient()) { ?>

	<input id='id_formation' value='<?php echo $id ?>' class='d-none'>
	<input id='id_client' value='<?php echo $_SESSION['id'] ?>' class='d-none'>
	<button type="button" id='submitBtn' class="btn btn-warning" onclick='submit()'>
		<?php
			if (existClientFormation($cnx, $id, $_SESSION['id'])) {
				echo 'Vous êtes déjà inscrits';
			} else {
				echo "S'inscrire";
			}
		?>
	</button>

	<script type="text/javascript">
		function submit() {
			let id_formation = document.getElementById('id_formation').value;
			let id_client = document.getElementById('id_client').value;
			ajax('/logic/subscribeFormation.php', 'id_formation=' + id_formation + '&id_client=' + id_client, function(res) {
				document.getElementById('submitBtn').textContent = res;
			});
		}
	</script>

<?php } ?>



<?php if (isOrganisme() && formationAppartientA($formation, $organisme)) { ?>

	<div class='row mt-3'>
	<div class='col-12'>
		<h1>Modifier la formation <?php echo $formation->nom ?></h1>
		<form action="/views/infoFormation.php" method='GET'>
			<input class='d-none' name='id' value="<?php echo $formation->id ?>">
			<div class="form-group">
			    <label for="name">Nom de la formation</label>
			    <input type="text" class="form-control" id="name" placeholder="Entrez le nom de la formation" name='name' value='<?php echo $formation->nom ?>'>
			</div>

			<div class="form-group">
			    <label for="cout">Coût</label>
			    <input type="number" class="form-control" id="cout" placeholder="Entrez le coût de la formation" name='cout' value='<?php echo $formation->cout ?>'>
			</div>

			<div class="form-group">
			    <label for="adresse">Adresse</label>
			    <input type="text" class="form-control" id="adresse" placeholder="Entrez l adresse de la formation" name='adresse' value='<?php echo $formation->adresse ?>'>
			</div>

			<div class="form-group">
			    <label for="diplome">Diplome</label>
			    <input type="text" class="form-control" id="diplome" placeholder="Entrez le diplome de la formation" name='diplome' value='<?php echo $formation->diplome ?>'>
			</div>

			<div class="form-group">
			    <label for="domaine">Domaine</label>
			    <input type="text" class="form-control" id="domaine" placeholder="Entrez le domaine de la formation" name='domaine' value='<?php echo $formation->domaine ?>'>
			</div>

			<button type='submit' class='btn btn-primary'>Modifier</button>
		</form>
	</div>
	</div>

<?php } ?>

<?php

	if (isset($_GET['name'])) {
		$id = $_GET['id'];
		$nom = $_GET['name'];
		$cout = $_GET['cout'];
		$domaine = $_GET['domaine'];
		$diplome = $_GET['diplome'];
		$adresse = $_GET['adresse'];

		updateFormationById ($cnx, $id, $nom, $cout, $domaine, $diplome, $adresse);
		header("Location: infoFormation.php?id=$id");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>Leaflet Map</title>

		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
			integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
		    crossorigin=""/>
		 <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
		    integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
		    crossorigin=""></script>
	</head>
	<body>

		<div id='map' style='height: 400px ; width: 400px'></div>
		<span id='adress' class='d-none'><?php echo "$formation->adresse" ?></span>
	</body>
</html>

<script>
	let map = L.map('map').setView([51.505, -0.09], 13);
	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
	    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
	    maxZoom: 18,
	    id: 'mapbox/streets-v11',
	    accessToken: 'pk.eyJ1IjoibGVvdHJveSIsImEiOiJjazRnNmN4d2MwdGJpM2VvMzZjNTd4NDI3In0.Dwp8r28aKcD9hTkOh25wrg'
	}).addTo(map);

	const PostFromAdress = (adress, call) => {
		let xml = new XMLHttpRequest();
	 	let url = "https://nominatim.openstreetmap.org/search?format=json&limit=3&q=" + adress;
	 	xml.onreadystatechange = function () {
	 		if (this.readyState == 4 && this.status == 200) {
	 			let array = JSON.parse(this.responseText);
	 			call([array[0].lat , array[0].lon]);
	 		}
	 	}
	 	xml.open("GET", url, true);
	 	xml.send();
	}

	const redirectMapTo = (adress) => {
		PostFromAdress(adress, (formaCoord) => {
			map.setView(formaCoord, 13);
			let marker = L.marker(formaCoord).addTo(map).bindPopup(adress);
		})
	}



	redirectMapTo(document.getElementById('adress').textContent);

</script>



<?php include '../php/finPage.php'; ?>