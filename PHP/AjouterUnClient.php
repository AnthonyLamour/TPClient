<?php

    //connexion à la BDD grâce au fichier BDDconnect
    include 'BDDConnect.php';

    //récupération et parsage de l'objet JSON
    $obj = json_decode($_GET["client"], false);
    //création de la requête sql
    if($obj->CATEGORIE=="NULL"){
        $sql='insert into CLIENT (NCLI,NOM,ADRESSE,LOCALITE,CATEGORIE,COMPTE) 
              values ("'.$obj->NCLI.'","'.$obj->NOM.'","'.$obj->ADRESSE.'","'.$obj->LOCALITE.'",'.$obj->CATEGORIE.','.$obj->COMPTE.');';
    }else{
        $sql='insert into CLIENT (NCLI,NOM,ADRESSE,LOCALITE,CATEGORIE,COMPTE) 
              values ("'.$obj->NCLI.'","'.$obj->NOM.'","'.$obj->ADRESSE.'","'.$obj->LOCALITE.'","'.$obj->CATEGORIE.'",'.$obj->COMPTE.');';
    }
    $conn->query($sql);
    //récupération de tout les clients de la base
    $sql = $conn->prepare("SELECT * FROM CLIENT ORDER BY ID DESC");
	//exécution de la requête sql
    $sql->execute();
	//récupération du résultat de la requête sql
    $clients = $sql->fetchAll();
	//renvoi du résultat sous forme d'objet JSON
    echo json_encode($clients);
	
?>