<?php include '../php/debutPage.php'; ?>


<?php 

  if (!isAdmin()) {
    error404();
  }

    $id = $_GET['id'];
    $organisme = getOrganismeById ($cnx, $id);
    $utilisateur = getAdminById($cnx, $_SESSION['id']);


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
	
  <li><strong>Ville:</strong><?php echo $organisme->ville ?></li></br>
  <li><strong>Adresse:</strong><?php echo "$organisme->adresse, $organisme->code_postal" ?></li>
  
  <li><strong>Date de création:</strong><?php echo $organisme->date_de_creation ?></li></br>
  <li><strong>Description:</strong><?php echo $organisme->description ?></li></br>
</ul>
</div>

	

<?php if (isAdmin() && ($utilisateur->type == "administrateur" || $utilisateur->type == "regulateur" )) { ?>
  <div class='row'>
    <div class='col-3'>
    </div>
    <div class='col-2'>
      <button type="button" id="valider" class="btn btn-warning w-100" onclick="valider(this, <?php echo $organisme->id ?>)">
          <?php echo ($organisme->estValide == 1 ? 'Organisme validée !' : "Valider") ?>
      </button> 
    </div>
<?php } ?>
<?php if (isAdmin() && ($utilisateur->type == "administrateur")) { ?>
    <div class='col-2'>
      <button type="button" id="valider" class="btn btn-warning w-100">
        Modifier
      </button>
    </div>
  </div>
  <div class='row mt-3'>
    <div class='col-4'>
    </div>
    <div class='col-2'>
        <a href="gererOrganisme.php"><button type="button" id='ref_<?php echo $organisme->id?>' class="btn btn-warning w-100" onclick='refuser(this, <?php echo $organisme->id ?>)'>Supprimer</button>
        </a>
      </div>
  </div>
<?php } ?>

  <script type="text/javascript">
      function valider(button, id) {
        ajax('../logic/validerOrganismeAdmin.php', 'id=' + id, function(res) {
          button.textContent = 'Organisme validée !';
          document.getElementById("ref_" + id).style.display = 'none';
        });
      }

      function refuser(button, id) {
        ajax('../logic/refuserOrganismeAdmin.php', 'id=' + id, function(res) {
          document.getElementById("tr_" + id).style.display = 'none';
        });
      }
  </script>

<?php include '../php/finPage.php'; ?>