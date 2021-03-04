<?php include '../php/debutPage.php'; ?>

<?php


	$nom = $_GET['nom'];
	$adresse = $_GET['adresse'];
	$diplome = $_GET['diplome'];
	$domaine = $_GET['domaine'];
 
	$formations = searchFormations ($cnx, $nom, $adresse, $domaine, $diplome);
?>


<link rel="stylesheet" href="../css/infoFormation.css" type="text/css" media="screen">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, iniatial-scale=1">

	<div class="pricing-table">
<?php foreach($formations as $formation) { ?>


	<div class="col">
	   <div class="table">
	   	<h2><?php echo $formation['nom'] ?></h2>
	   
	   <div class="pop">Popular</div>
	   <div class="price"> <?php echo $formation['cout'] ?>
	   	<span>Pour la formation</span>
	   </div>	
      <ul>
      	<li><?php echo $formation['adresse'] ?></li>
      	<li><?php echo $formation['diplome'] ?></li>
      	<li><?php echo $formation['domaine'] ?></li>
      	<li>Acount</li>
      </ul>
     <a class="nav-link" href="infoFormation.php?id=<?php echo $formation['id'] ?>">
		    	See more<span class="sr-only">(current)</span>
		    </a>
      </div>
    </div>


<?php } ?>   
</div> 

<!-- <table class="table">
	<thead>
	    <tr>
  			<th scope="col"></th>
  			<th scope="col"></th>
  			<th scope="col"></th>
  			<th scope='col'></th>
		</tr>
	</thead>
	<tbody>
		<--?php foreach($formations as $formation) { ?>
			<tr>
		    	<td>
		    		<a class="nav-link" href="views/infoFormation.php?id=<-?php echo $formation['id'] ?>">
		    			<-?php echo $formation['nom'] ?> <span class="sr-only">(current)</span>
		    		</a>
		    	</td>
		    	<td><-?php echo $formation['adresse'] ?></td>
		    	<td><-?php echo $formation['diplome'] ?></td>
		    	<td><-?php echo $formation['domaine'] ?></td>
	    	</tr>
	    	
	    <-?php } ?>
	</tbody>
</table> -->


<?php include '../php/finPage.php'; ?>