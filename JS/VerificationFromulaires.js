// JavaScript source code
function VerifFormulaireAjout() {
    //variable bool permettant de savoir si le formulaire est valide
    var FromValide = true;
    //tableau contenant toutes les lettres de l'alphabet en majuscule
    var MajAlphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    //tableau contenant tout les chiffres
    var Chiffres = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    //valeur de l'input NCLI
    var NCLI = document.getElementById("NCLI").value;
    //valeur de l'input NOM
    var NOM = document.getElementById("NOM").value;
    //valeur de l'input ADRESSE
    var ADRESSE = document.getElementById("ADRESSE").value;
    //valeur de l'input LOCALITE
    var LOCALITE = document.getElementById("LOCALITE").value;
    //valeur de l'input COMPTE
    var COMPTE = document.getElementById("COMPTE").value;

    //objet de message d'érreur de NCLI
    var MessageErreurNCLI = document.getElementById("MessageErreurNCLI");
    //objet de message d'érreur de NOM
    var MessageErreurNOM = document.getElementById("MessageErreurNOM");
    //objet de message d'érreur de ADRESSE
    var MessageErreurADRESSE = document.getElementById("MessageErreurADRESSE");
    //objet de message d'érreur de LOCALITE
    var MessageErreurLOCALITE = document.getElementById("MessageErreurLOCALITE");
    //objet de message d'érreur de COMPTE
    var MessageErreurCOMPTE = document.getElementById("MessageErreurCOMPTE");

    //reset des messages d'érreurs
    MessageErreurNCLI.innerHTML = "";
    MessageErreurNOM.innerHTML = "";
    MessageErreurADRESSE.innerHTML = "";
    MessageErreurLOCALITE.innerHTML = "";
    MessageErreurCOMPTE.innerHTML = "";

    //gestion d'érreur de NCLI
    if (NCLI == "") {
        MessageErreurNCLI.innerHTML = "Veuillez entrer un numéro";
        FromValide = false;
    } else if (NCLI.length != 4) {
        MessageErreurNCLI.innerHTML = "Le numéro doit faire 4 caractères";
        FromValide = false;
    } else if ((MajAlphabet.indexOf(NCLI[0]) == -1) || (Chiffres.indexOf(NCLI[1]) == -1) || (Chiffres.indexOf(NCLI[2]) == -1) || (Chiffres.indexOf(NCLI[3]) == -1)) {
        MessageErreurNCLI.innerHTML = "Le numéro est une lettre majuscule suivi de 3 chiffres";
        FromValide = false;
    }

    //gestion d'érreur de NOM
    if (NOM == "") {
        MessageErreurNOM.innerHTML = "Veuillez entrer un nom";
        FromValide = false;
    } else if (NOM.length > 50) {
        MessageErreurNOM.innerHTML = "Le nom doit comporter moins de 50 lettres";
        FromValide = false;
    }

    //gestion d'érreur de ADRESSE
    if (ADRESSE == "") {
        MessageErreurADRESSE.innerHTML = "Veuillez entrer une adresse";
        FromValide = false;
    } else if (ADRESSE.length > 100) {
        MessageErreurADRESSE.innerHTML = "L'adresse doit comporter moins de 100 lettres";
        FromValide = false;
    }

    //gestion d'érreur de LOCALITE
    if (LOCALITE == "") {
        MessageErreurLOCALITE.innerHTML = "Veuillez entrer une localité";
        FromValide = false;
    } else if (LOCALITE.length > 50) {
        MessageErreurLOCALITE.innerHTML = "La localité doit comporter moins de 50 lettres";
        FromValide = false;
    }

    //gestion d'érreur de COMPTE
    if (COMPTE == "") {
        MessageErreurCOMPTE.innerHTML = "Veuillez entrer un compte";
        FromValide = false;
    } else {
        for (var i = 0; i < COMPTE.length; i++) {
            if (Chiffres.indexOf(COMPTE[0]) == -1) {
                MessageErreurCOMPTE.innerHTML = "Un compte n'est composé que de chiffres";
                FromValide = false;
            }
        }
    }

    //renvoi de FromValide
    return FromValide;
}