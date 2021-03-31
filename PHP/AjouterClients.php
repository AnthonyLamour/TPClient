<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<!--head de la page-->
<head>
    <!--encodage de la page-->
    <meta charset="utf-8" />
    <!--titre de la page-->
    <title>Accueil</title>
    <!--lien vers le CSS de la page-->
    <link rel="stylesheet" href="../CSS/Style.css" />
    <!--icone de la page-->
    <link rel="icon" href="../Images/icon.png">
    <!--lien vers le fichier js de vérification de formulaires-->
    <script type="text/javascript" src="../JS/VerificationFromulaires.js" charset="utf-8"></script>
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
    </nav>
    
    <!--titre principal de la page-->
    <h1>Ajouter un client à la liste des clients</h1>

    <!--Contenu de la page-->
    <fieldset id="AjoutClientContenu">
        <legend>
            Formulaire d'ajout
        </legend>
        <form id="MainFormulaire">
            <label for="NCLI">Numéro de client :</label>
            <input type="text" id="NCLI" placeholder="A000" required/><span id="MessageErreurNCLI" class="MessageErreur"></span>
            <label for="NOM">Nom :</label>
            <input type="text" id="NOM" placeholder="Nom" required/><span id="MessageErreurNOM" class="MessageErreur"></span>
            <label for="ADRESSE">Adresse :</label>
            <input type="text" id="ADRESSE" placeholder="4 rue Exemple" required/><span id="MessageErreurADRESSE" class="MessageErreur"></span>
            <label for="LOCALITE">Localité :</label>
            <input type="text" id="LOCALITE" placeholder="Paris" required/><span id="MessageErreurLOCALITE" class="MessageErreur"></span>
            <label for="CATEGORIE">Catégorie :</label>
            <select id="CATEGORIE">
                <option value="NULL">Aucune</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
            <label for="COMPTE">Compte :</label>
            <input type="number" id="COMPTE" placeholder="00" required/><span id="MessageErreurCOMPTE" class="MessageErreur"></span>
            <input type="button" id="ValideButton" value="Valider" onclick="AjouterUnClient()"/>
        </form>
    </fieldset>
    <br/>
    <!--Contenu de la page-->
    <div id="ClientTable">
    
    </div>
    
    <script>
        MainContent=document.getElementById("ClientTable");
        function AjouterUnClient(){
            if(VerifFormulaireAjout()){
                //reset du div de résultat
                MainContent.innerHTML="";
			    //création d'un nouveau tableau HTML
                var newTable = document.createElement("table");
			    //création de l'objet JSON
                var ClientJSONObj={"NCLI": document.getElementById("NCLI").value,
                                   "NOM": document.getElementById("NOM").value,
                                   "ADRESSE": document.getElementById("ADRESSE").value,
                                   "LOCALITE": document.getElementById("LOCALITE").value,
                                   "CATEGORIE": document.getElementById("CATEGORIE").value,
                                   "COMPTE": document.getElementById("COMPTE").value};
                //convertion de l'objet JSON en chaine pour le passer en paramètre
			    var dbParam = JSON.stringify(ClientJSONObj);
			    //création d'une requête XMLHttpRequest
                var xhttp = new XMLHttpRequest();
			    //lorsque la requête est envoyé
                xhttp.onreadystatechange = function () {
				    //si la requête est prête
                    if (this.readyState == 4 && this.status == 200) {
					    //récupération et parsage du résultat en JSON avec suppression du caractère vide correspondant à la validation de l'envoie
                        var json = JSON.parse(this.responseText.substring(1));
                        //pour chaque élément du JSON
					    for (var i = 0; i < json.length; i++) {
						    //création d'une nouvelle ligne du tableau
                            var newLine = document.createElement("tr");
						    //création d'une nouvelle colone du tableau
                            var newCol = document.createElement("td");
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
                xhttp.open("GET", "AjouterUnClient.php?client=" + dbParam, true);
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