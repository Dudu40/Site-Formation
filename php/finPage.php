	</main>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
		<script type="text/javascript" src='../js/ajax.js'></script>
  <footer>		
  <nav class="navbar navbar-light bg">
    <div class="pied">
    	<div class="pied-section">
	 	<div class="pied-contenu1">	
		    <div class="pied-liens">
		        <h3>Lien utile</h3>
		        <a href="https://capeisti.fr/" class='colLink'>capEISTI</a>
		    </div>
		</div> 
		<div class="pied-contenu2">       
	 		<div class="pied-contact">
		 		<!-- <div class="navbar-brand">Contacter nous</div> -->
		 		<h3><a href="/views/contact.php"  class='colLink'> Contacter nous</a></h3>
		 		<div class="contact">	
		 		<span><i class="fas fa-phone"></i><a href="tel:+33615652398"  class='colLink'> 00330000000 </a> &nbsp; <i class="fas fa-envelope"></i><a href="mailto:contact@raeda.com"  class='colLink'> contact@raeda.com </a></span>
		 		<br>
		 		<span></span>
		 		</div>
		 		<!-- <div class="mail"><a class="mail" href="mailto:contact@raeda.com"> contact@raeda.com </a></div>
		 		<div class="tel"><a  class="tel" href="tel:+33615652398"> 00330000000 </a></div> -->
		 		<div class="sociale">
		 		<a href="#"><i class="fab fa-facebook"></i></a>&nbsp; &nbsp;
		 		<a href="#"><i class="fab fa-instagram"></i></a>&nbsp; &nbsp;
		 		<a href="#"><i class="fab fa-twitter"></i></a>
		 		</div>
	 		</div>
	 	</div>	
	 		<div class="pied-bas">
			   &copy; raeda.com | Designed by EISTI student | <script>document.write(new Date().getFullYear());</script>
		    </div>	
 		</div>
 	</div>
    </footer>
	<!-- <nav class="navbar fixed-bottom navbar-light bg-light">


 		 <div>
 		 <a class="navbar-brand">Contacter nous</a>
 		 <br>
 		 <a href="mailto:contact@raeda.com"> contact@raeda.com </a>
 		 <a href="tel:+33615652398"> 0615652398 </a>
 		 	
 		 </div>

 		 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
 		 <a class="navbar-brand" href="#">Haut de la page</a>
	</nav> -->
    
	</body>  
</html>

<?php
	disconnectBDD($cnx);
?>