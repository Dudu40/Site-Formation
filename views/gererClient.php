<?php include '../php/debutPage.php'; ?>

<?php 


	$clients = selectAllClient($cnx);


?>

<link rel="stylesheet" type="text/css" href="../css/gerer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

<div class="all">
  <div class="notComp" >
         <h3>Client</h3>
        <?php foreach($clients as $client) { ?>
          <div class="task">
            <div><a href="profilClientAdmin.php?id=<?php echo $client['id'] ?>"><?php echo $client['nom'] ?></a>
            </div>
         </div>
      <?php } ?>








<?php include '../php/finPage.php'; ?>



