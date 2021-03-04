<?php include '../php/debutPage.php'; ?>


<?php 
  
    if (!isAdmin()) {
      error404();
    }

    $id = $_GET['id'];
    $client = getClientById ($cnx, $id);
    $utilisateur = getAdminById($cnx, $_SESSION['id']);


?>

<link rel="stylesheet" href="../css/profil.css" type="text/css">
<link rel="stylesheet" href="../css/ajouterFormation.css" type="text/css">
	
	<p><strong>Nom:</strong><?php echo $client->nom ?></p>
	<p><strong>Email:</strong><?php echo $client->email ?></p>
	

<?php if (isAdmin() && ($utilisateur->type == "administrateur")) { ?>

  <button type="button" id="valider" class="btn btn-warning">Modifier</button>

  <a href="gererClient.php"><button type="button" id='ref_<?php echo $client->id?>' class="btn btn-danger" onclick='refuser(this, <?php echo $client->id ?>)'>Supprimer</button>
  </a>

  <script type="text/javascript">
      function valider(button, id) {
        ajax('../logic/validerClientAdmin.php', 'id=' + id, function(res) {
          button.textContent = 'Formation validée !';
          document.getElementById("ref_" + id).style.display = 'none';
        });
      }

      function refuser(button, id) {
        ajax('../logic/refuserClientAdmin.php', 'id=' + id, function(res) {
          document.getElementById("tr_" + id).style.display = 'none';
        });
      }
  </script>
<?php } ?>



<?php include '../php/finPage.php'; ?>