<?php include '../php/debutPage.php'; ?>

<?php 


	$organismes = selectAllOrganisme ($cnx);


?>

<link rel="stylesheet" type="text/css" href="../css/gerer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

<div class="all">
  <div class="notComp">
        <h1>Formations</h1>
        <?php foreach($organismes as $organisme) { ?>
          <div class="task">
            <div><a href="profilOrganismeAdmin.php?id=<?php echo $organisme['id'] ?>"><?php echo $organisme['nom'] ?></a>
            </div>
         </div>
      <?php } ?>
      
  </div>

</div>




<?php include '../php/finPage.php'; ?>