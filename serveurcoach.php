<?php
include "fonctions.php";

if (isset($_REQUEST["op"])) {

	if ($_REQUEST["op"]=="recup") {

		try {
			$cnx = connexionPDO();
			$req = $cnx->prepare("select * from profil order by datemesure desc");
			$req->execute();
		  
			while ($ligne = $req->fetch(PDO::FETCH_ASSOC)){
				$resultat[]=$ligne;
			}
			print(json_encode($resultat));
			
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}

	}elseif ($_REQUEST["op"]=="enreg") {

		// récupération des paramètres en post
		$datemesure = $_REQUEST["datemesure"] ;
		$taille = $_REQUEST["taille"] ;
		$poids = $_REQUEST["poids"] ;
		$age = $_REQUEST["age"] ;
		$sexe = $_REQUEST["sexe"] ;
print "*".$datemesure."*".$taille."*".$poids."*".$age."*".$sexe."*" ;	
		// insertion dans la base de données
		try {
			$cnx = connexionPDO();
			$req = $cnx->prepare("insert into profil (datemesure, taille, poids, age, sexe) values (\"$datemesure\", $taille, $poids, $age, $sexe)");
			$req->execute();
			
		} catch (PDOException $e) {
			print "Erreur !: " . $e->getMessage();
			die();
		}

	}

}

?>