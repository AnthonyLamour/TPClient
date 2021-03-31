<?php

    //connexion à la BDD grâce au fichier BDDconnect
    include 'BDDConnect.php';

    //récupération de l'id du client à supprimer
    $identifiant = $_GET["id"];
    //création de la requête sql
    $sql= $conn->prepare('SELECT * FROM CLIENT
                          WHERE id=:Identifiant;');
    $sql->bindParam(":Identifiant",$identifiant);
    //exécution de la requête sql
    $sql->execute();
	//récupération du résultat de la requête sql
    $clients = $sql->fetchAll();
	//renvoi du résultat sous forme d'objet JSON
    echo json_encode($clients);
	
?>