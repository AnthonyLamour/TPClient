<?php
    //création de l'objet PHP Client
    class Client{
		//ID du client
		private $ID;
		//Numéro de client
		private $NCLI;
		//Nom du client
		private $NOM;
		//Adresse du client
		private $ADRESSE;
        //localité du client
		private $LOCALITE;
        //catégorie du client
		private $CATEGORIE;
        //compte du client
		private $COMPTE;

		//fonction permettant de setter l'ID
		function Set_ID($newID){
			$this->ID=$newID;
		}
        
        //fonction permettant de setter le numéro de client
		function Set_NCLI($newNCLI){
			$this->NCLI=$newNCLI;
		}

		//fonction permettant de setter le nom
		function Set_NOM($newNOM){
			$this->NOM=$newNOM;
		}
        
        //fonction permettant de setter l'adresse du client
		function Set_ADRESSE($newADRESSE){
			$this->ADRESSE=$newADRESSE;
		}

        //fonction permettant de setter la localité du client
		function Set_LOCALITE($newLOCALITE){
			$this->LOCALITE=$newLOCALITE;
		}
        
        //fonction permettant de setter la  catégorie du client
		function Set_CATEGORIE($newCATEGORIE){
			$this->CATEGORIE=$newCATEGORIE;
		}

        //fonction permettant de setter le compte du client
		function Set_COMPTE($newCOMPTE){
			$this->COMPTE=$newCOMPTE;
		}

		//fonction permettant de récupérer l'ID
		function Get_ID(){
			return $this->ID;
		}

        //fonction permettant de récupérer le numéro de client
		function Get_NCLI(){
			return $this->NCLI;
		}

		//fonction permettant de récupérer le nom
		function Get_NOM(){
			return $this->NOM;
		}

        //fonction permettant de récupérer l'adresse du client
		function Get_ADRESSE(){
			return $this->ADRESSE;
		}
        
        //fonction permettant de récupérer la localité du client
		function Get_LOCALITE(){
			return $this->LOCALITE;
		}

        //fonction permettant de récupérer la catégorie du client
		function Get_CATEGORIE(){
			return $this->CATEGORIE;
		}

        //fonction permettant de récupérer le compte du client
		function Get_COMPTE(){
			return $this->COMPTE;
		}

		//fonction permettant d'initialiser complètement un client
		function Init_CLIENT($newID,$newNCLI,$newNOM,$newADRESSE,$newLOCALITE,$newCATEGORIE,$newCOMPTE){
			$this->Set_ID($newID);
            $this->Set_NCLI($newNCLI);
			$this->Set_NOM($newNOM);
			$this->Set_ADRESSE($newADRESSE);
			$this->Set_LOCALITE($newLOCALITE);
			$this->Set_CATEGORIE($newCATEGORIE);
			$this->Set_COMPTE($newCOMPTE);
		}

        //fonction permettant de récupérer complètement un client
		function Get_CLIENT(){
            $ClientInfos = array("ID" => $this->Get_ID(),
                                 "NCLI" => $this->Get_NCLI(),
                                 "NOM" => $this->Get_NOM(),
                                 "ADRESSE" => $this->Get_ADRESSE(),
                                 "LOCALITE" => $this->Get_LOCALITE(),
                                 "CATEGORIE" => $this->Get_CATEGORIE(),
                                 "COMPTE" => $this->Get_COMPTE(),
                            );
            return $ClientInfos;
		}
	}
?>