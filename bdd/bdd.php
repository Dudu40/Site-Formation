<?php
	
	function connectBDD() {
		$user = "ducasseque";
		$pass = "azerty";
		$base = "Raeda";
		$serv = "localhost";

		$cnx = new mysqli($serv, $user, $pass, $base);
		return $cnx;
	}

	function disconnectBDD($cnx) {
		$cnx->close();
	}

	function requete($cnx, $req) {
		if ($res = mysqli_query($cnx, $req)) {
			
        } else {
            echo "Error: " . $req ;
        }
        return $res;
	}
?>
