<?php include '../php/debutPage.php'; ?>

<?php 

    $formations = selectAllFormation ($cnx);


?>
<link rel="stylesheet" type="text/css" href="../css/gerer.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <div class="all">
  <div class="notComp" > 
  <h3>Formations</h3>

 <?php foreach($formations as $formation) { ?>

          <div class="task">
            <div><a href="profilFormationAdmin.php?id=<?php echo $formation['id'] ?>"><?php echo $formation['nom'] ?></a>
            </div>
         </div>
      <?php } ?>

</div>


<?php include '../php/finPage.php'; ?>

