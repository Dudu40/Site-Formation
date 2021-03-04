<?php include '../php/debutPage.php'; ?>


<?php 

  if (!isAdmin()) {
    error404();
  }

    $id = $_GET['id'];
    $formation = getFormationById ($cnx, $id);
    $organisme = getOrganismeById ($cnx, $formation->id_organisme);
    $utilisateur = getAdminById($cnx, $_SESSION['id']);


?>

<link rel="stylesheet" href="../css/infoFormation.css" type="text/css">
<link rel="stylesheet" href="../css/ajouterFormation.css" type="text/css">

 


  <div class="col">
     <div class="table">
      <h2>Nom:<?php echo $formation->nom ?></h2>
  
      <ul>
        <li>Coût:<?php echo $formation->cout ?></li>
        <li>Organisme:<?php echo $organisme->nom ?></</li>
        <li>Description:<?php echo $formation->description ?></li>
        
      </ul>
     
      </div>
    </div>



	
<!-- 	<p><strong>Nom:</strong><?php echo $formation->nom ?></p>
	<p><strong>Coût:</strong><?php echo $formation->cout ?></p>
	<p><strong>Organisme:</strong><?php echo $organisme->nom ?></p>
	<p><strong>Description:</strong><?php echo $formation->description ?></p> -->



<?php if (isAdmin() && ($utilisateur->type == "administrateur" || $utilisateur->type == "regulateur")) { ?>

  <button type="button" id="valider" class="btn btn-warning" onclick="valider(this, <?php echo $formation->id ?>)">
      <?php echo ($formation->estValide == 1 ? 'Formation validée !' : "Valider") ?>
  </button>
<?php } ?>

<?php if (isAdmin() && ($utilisateur->type == "administrateur")){ ?>
  <button type="button" id="valider" class="btn btn-warning">Modifier</button>

  <a href="gererFormation.php"><button type="button" id='ref_<?php echo $formation->id?>' class="btn btn-warning" onclick='refuser(this, <?php echo $formation->id ?>)'>Supprimer</button>
  </a>
<?php } ?>

  <script type="text/javascript">
      function valider(button, id) {
        ajax('../logic/validerFormationAdmin.php', 'id=' + id, function(res) {
          button.textContent = 'Formation validée !';
          document.getElementById("ref_" + id).style.display = 'none';
        });
      }

      function refuser(button, id) {
        ajax('../logic/refuserFormationAdmin.php', 'id=' + id, function(res) {
          document.getElementById("tr_" + id).style.display = 'none';
        });
      }
  </script>










<?php include '../php/finPage.php'; ?>