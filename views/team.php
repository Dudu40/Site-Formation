<?php include '../php/debutPage.php'; ?>
	
<?php
	$formations = selectAllFormation ($cnx);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>OUR TEAM</title>
    <link rel="stylesheet" href="../css/team.css" type="text/css">
</head>
<body>
	<div class="presentation">
		<h1>Presentation de l'entreprise</h1>
		<p>
			Cap’EISTI est une association de type Junior-Entreprise. Tu pourras y vivre ta première expérience professionnelle et découvrir un aperçu concret de la vie en entreprise, dans une atmosphère de travail conviviale.
			Qu’est-ce qu’une Junior-Entreprise ? C’est une association à vocation économique et pédagogique, réalisant des études rémunérées pour des clients très variés, qui répond aux critères de la CNJE (Confédération Nationale des Junior-Entreprises).

			Quels sont nos champs d’action ? Cap’EISTI met à profit les compétences des élèves-ingénieurs de l’EISTI pour la réalisation de missions au sein d’entreprises. Nous intervenons dans un large domaine informatique reflétant les différentes options enseignées par l’EISTI. Nous organisons également des rencontres où nous rassemblons étudiants et anciens étudiants.

			Pourquoi nous rejoindre ? Cap’EISTI te permettra de développer tes compétences techniques, mais t’apprendra surtout la gestion de projet et d’entreprise : la gestion d’une Junior est en tout point comparable à la gestion d’une entreprise ! Tu auras l’opportunité de tisser des liens avec le monde de l’entreprise, et toucher des indemnités tout en te formant au monde professionnel. Tu pourras également participer aux différents Congrès Nationaux organisés par la CNJE, où tu pourras apprendre durant les séances de formation en journée, et t’éclater le soir.
			Si tu as le goût de l’initiative, le sens des responsabilités et que tu veux construire brillamment ta carrière de futur ingénieur, rejoins-nous !
		</p>

	</div>
    <div class="section">
		   <h1>Equipe</h1>
		<div class="image">
		   <a href="#p4"><img src="../image/quentin.jpg" alt="photo"></a>
		</div>
	</div>	
        <div class="under" id="p2">
		   <span class="nom">Ichrak ELHAFIANE</span>
		   <span class="border"></span>
		   <p>" Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident."</p>
        </div>
        <div class="under" id="p3">
		   <span class="nom">Manal BOUZOUBAA</span>
		   <span class="border"></span>
		   <p>" Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat."</p>
        </div>
        <div class="under" id="p4">
		   <span class="nom">Quentin DUCASSE</span>
		   <span class="border"></span>
		   <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. "</p>
        </div>
</body>
</html>

<?php include '../php/finPage.php'; ?>