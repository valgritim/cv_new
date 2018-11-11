<?php

class Fournisseur extends Personne{
	
	protected $_codeCompta;

	// constructeur------------

 function __construct($nom,$prenom,$dateNaiss,$mail,$adresse,$ville,$codePostal,$codeCompta){

 	parent::__construct($nom,$prenom,$dateNaiss,$mail,$adresse,$ville,$codePostal);
 	$this->setCodeCompta($codeCompta);
 }

 // ---------------accesseurs-------------
 	public function getCodeCompta(){

 		return $this->_codeCompta;
 	}

 // ---------------mutateurs------------------
	public function setCodeCompta(){

		return $this->_codeCompta;
	}


 // ---------------méthodes-----------------
	public function new(){

	}

	public function read(){

	}

	public function update(){

	}

	public function delete(){

	}
	

}



?>