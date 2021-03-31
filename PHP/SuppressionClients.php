<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!--head de la page-->
<head>
    <!--encodage de la page-->
    <meta charset="utf-8" />
    <!--titre de la page-->
    <title>Suppression Client</title>
    <!--lien vers le CSS de la page-->
    <link rel="stylesheet" href="../CSS/Style.css" />
    <!--icone de la page-->
    <link rel="icon" href="../Images/icon.png">
</head>

<!--contenu de la page-->
<body>
    <!--menu de navigation entre les pages-->
    <nav>
        <!--titre du menu de navigation-->
        <h3>Menu de navigation :</h3>
        <!--lien vers la page d'accueil-->
        <a href="../index.html" class="navLink" >Accueil</a><br/>
        <!--lien vers la page de récupération des clients-->
        <a href="ListeDeClient.php" class="navLink" >Récupération clients</a><br/>
        <!--lien vers la page d'ajout de clients-->
        <a href="AjouterClients.php" class="navLink" >Ajout clients</a><br/>
        <!--lien vers la page de modification de clients-->
        <a href="ModifierClients.php" class="navLink" >Modification clients</a><br/>
    </nav>
    
    <!--titre principal de la page-->
    <h1>Supprimer un client de la liste des clients</h1>

    <!--Contenu de la page-->
    <fieldset id="SuppressionClientContenu">
        <!--légende du Formulaire-->
		<legend>
            Formulaire de suppression
        </legend>
		<!--Formulaire de la page-->
        <form id="MainFormulaire">
			<!--label du select de client-->
            <label for="SelectedClient">Choisissez un client :</label>
			<!--select de client-->
            <select id="SelectedClient">
                <?php
                    //connexion à la BDD grâce au fichier BDDconnect
                    include 'BDDConnect.php';
					//création de la requête sql permettant de récupérer les armes-->
                    $sql = "SELECT * FROM CLIENT";
					//pour chaque résultat
                    foreach($conn->query($sql) as $Client){
                        //ajout d'une option du select
						echo '<option value = "'.$Client["ID"].'">'.$Client["NCLI"].' '.$Client["NOM"].'</option>';
                    }
                ?>
            </select>
			<!--bouton permettant de valider le Formulaire-->
            <input type="button" id="Envoi" value="Valider" onclick="SupprimerUnClient()" />
        </form>
    </fieldset>
    <br/>
    <!--Contenu de la page-->
    <div id="ClientTableSansID">
    
    </div>

    <script>
        MainContent=document.getElementById("ClientTableSansID");
        function SupprimerUnClient(){
            //création du message de confirmation
            var msg = 'Voulez vous vraiment supprimer le client :'+document.getElementById("SelectedClient").options[document.getElementById("SelectedClient").selectedIndex].text;
            if (confirm(msg) ){
                //reset du div de résultat
                MainContent.innerHTML="";
			    //création d'un nouveau tableau HTML
                var newTable = document.createElement("table");
                //convertion de l'objet JSON en chaine pour le passer en paramètre
			    var dbParam = document.getElementById("SelectedClient").value;
			    //création d'une requête XMLHttpRequest
                var xhttp = new XMLHttpRequest();
			    //lorsque la requête est envoyé
                xhttp.onreadystatechange = function () {
				    //si la requête est prête
                    if (this.readyState == 4 && this.status == 200) {
                        //création d'une nouvelle ligne du tableau
                        var newLine = document.createElement("tr");
                        //création d'une nouvelle colone du tableau
                        var newCol = document.createElement("th");
                        //set de l'attribut class de la case
                        newCol.setAttribute("class", "TextCadre");
                        //remplissage de la case
                        newCol.innerHTML="Numéro  de client";
                        //ajout de la case dans la ligne
                        newLine.appendChild(newCol);
                        //création d'une nouvelle colone du tableau
                        var newCol = document.createElement("th");
                        //set de l'attribut class de la case
                        newCol.setAttribute("class", "TextCadre");
                        //remplissage de la case
                        newCol.innerHTML="Nom";
                        //ajout de la case dans la ligne
                        newLine.appendChild(newCol);
                        //création d'une nouvelle colone du tableau
                        var newCol = document.createElement("th");
                        //set de l'attribut class de la case
                        newCol.setAttribute("class", "TextCadre");
                        //remplissage de la case
                        newCol.innerHTML="Adresse";
                        //ajout de la case dans la ligne
                        newLine.appendChild(newCol);
                        //création d'une nouvelle colone du tableau
                        var newCol = document.createElement("th");
                        //set de l'attribut class de la case
                        newCol.setAttribute("class", "TextCadre");
                        //remplissage de la case
                        newCol.innerHTML="Localité";
                        //ajout de la case dans la ligne
                        newLine.appendChild(newCol);
                        //création d'une nouvelle colone du tableau
                        var newCol = document.createElement("th");
                        //set de l'attribut class de la case
                        newCol.setAttribute("class", "TextCadre");
                        //remplissage de la case
                        newCol.innerHTML="Catégorie";
                        //ajout de la case dans la ligne
                        newLine.appendChild(newCol);
                        //création d'une nouvelle colone du tableau
                        var newCol = document.createElement("th");
                        //set de l'attribut class de la case
                        newCol.setAttribute("class", "TextCadre");
                        //remplissage de la case
                        newCol.innerHTML="Compte";
                        //ajout de la case dans la ligne
                        newLine.appendChild(newCol);
                        //ajout de la ligne dans le tableau
                        newTable.appendChild(newLine);
					    //récupération et parsage du résultat en JSON avec suppression du caractère vide correspondant à la validation de l'envoie
                        var json = JSON.parse(this.responseText.substring(1));
                        //pour chaque élément du JSON
					    for (var i = 0; i < json.length; i++) {
						    //création d'une nouvelle ligne du tableau
                            newLine = document.createElement("tr");
						    //création d'une nouvelle colone du tableau
                            newCol = document.createElement("td");
						    //set de l'attribut class de la case
                            newCol.setAttribute("class", "TextCadre");
						    //remplissage de la case
                            newCol.innerHTML = json[i].NCLI;
						    //ajout de la case dans la ligne
                            newLine.appendChild(newCol);
						    //création d'une nouvelle colone du tableau
                            newCol = document.createElement("td");
						    //set de l'attribut class de la case
                            newCol.setAttribute("class", "TextCadre");
						    //remplissage de la case
                            newCol.innerHTML = json[i].NOM;
						    //ajout de la case dans la ligne
                            newLine.appendChild(newCol);
						    //création d'une nouvelle colone du tableau
                            newCol = document.createElement("td");
						    //set de l'attribut class de la case
                            newCol.setAttribute("class", "TextCadre");
						    //remplissage de la case
                            newCol.innerHTML = json[i].ADRESSE;
						    //ajout de la case dans la ligne
                            newLine.appendChild(newCol);
						    //création d'une nouvelle colone du tableau
                            newCol = document.createElement("td");
						    //set de l'attribut class de la case
                            newCol.setAttribute("class", "TextCadre");
						    //remplissage de la case
                            newCol.innerHTML = json[i].LOCALITE;
						    //ajout de la case dans la ligne
                            newLine.appendChild(newCol);
						    //création d'une nouvelle colone du tableau
                            newCol = document.createElement("td");
						    //set de l'attribut class de la case
                            newCol.setAttribute("class", "TextCadre");
						    //remplissage de la case
                            newCol.innerHTML = json[i].CATEGORIE;
						    //ajout de la case dans la ligne
                            newLine.appendChild(newCol);
                            //création d'une nouvelle colone du tableau
                            newCol = document.createElement("td");
						    //set de l'attribut class de la case
                            newCol.setAttribute("class", "TextCadre");
						    //remplissage de la case
                            newCol.innerHTML = json[i].COMPTE;
						    //ajout de la case dans la ligne
                            newLine.appendChild(newCol);
						    //ajout de la ligne dans le tableau
                            newTable.appendChild(newLine);
                        }
					    //ajout du tableau dans le div
                        MainContent.appendChild(newTable);
                    }
                };
                //ouverture du fichier XML
                xhttp.open("GET", "SupprimerUnClient.php?id=" + dbParam, true);
                //envoi de la requète
                xhttp.send();
            }
        }
    </script>
    
    <!--footer-->
    <footer>
        <!--paragraphe de footer-->
        <p>Anthony LAMOUR étudiant en Master 2 à Ludus Académie</p>
    </footer>
</body>

</html>