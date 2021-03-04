
<?php include '../php/debutPage.php'; ?>


<link rel="stylesheet" type="text/css" href="../css/accueil.css">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>

<div class="gr-boite">
    <div class="pt-boite">
    	<div class="titre-boite">
    		<h1>Barre de recherche</h1>
    	</div>
    	<div class="recherche-boite">
			<form action='/views/toutesFormations.php' method='get'>
					<div class="recherche-nom">
				    	<input type="text" class="form-control" placeholder="Nom" name='nom'>
				    </div>
				    <div class="recherche-adresse">
				    	<input type="text" class="form-control" placeholder="Adresse" name='adresse'>
				    </div>
				    <div class="recherche-plus">
				    	<input type="text" class="form-control" placeholder="Diplome" name='diplome'>

				    	<input type="text" class="form-control" placeholder="Domaine" name='domaine'>
				    </div>
				    <div class="recherche-box">
                        <button type='submit' >
				    		<span></span>
				    		<span></span>
                            <span></span>
				    		<span></span>
				    		Rechercher
				    	</button>
	                </div> 
			</form>
	    </div>
    </div>
</div>



 <?php include '../php/finPage.php'; ?>




<!-- <?php include '../php/debutPage.php'; ?>


<link rel="stylesheet" type="text/css" href="../css/accueil.css">
<script src="https://kit.fontawesome.com/99f567f48c.js" crossorigin="anonymous"></script>

<div class="gr-boite">
    <div class="pt-boite">
    	<div class="titre-boite">
    		<h1>Chaque jour est une nouvelle chance d'y arriver.</h1>
    	</div>
    	<div class="recherche-boite">
			<form action='/views/toutesFormations.php' method='get'>
					<div class="recherche-nom">
				    	<input type="text" class="form-control" placeholder="Nom" name='nom'>
				    </div>
				    <div class="recherche-adresse">
				    	<input type="text" class="form-control" placeholder="Adresse" name='adresse'>
				    </div>
				    <div class="recherche-plus">
				    	<input type="text" class="form-control1" placeholder="Diplome" name='diplome'>

				    	<input type="text" class="form-control1" placeholder="Domaine" name='domaine'>
				    </div>
				    <div class="recherche-box">
				    	<button type='submit' class='btn btn-primary'>
				    		<span></span>
				    		<span></span>
                            <span></span>
				    		<span></span>
				    		Rechercher
				    	</button>
	                </div> 
			</form>
	    </div>
    </div>
</div>



 <?php include '../php/finPage.php'; ?>  -->