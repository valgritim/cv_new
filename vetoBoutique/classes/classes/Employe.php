<?php

class Employe extends Personne{
	
	protected $_numSecu;
	protected $_fonction = 'Employé';
	protected $_salaire = 1300;
	protected $_superieur;

	// constructeur------------

 function __construct($nom,$prenom,$dateNaiss,$email,$adresse,$ville,$codePostal,$numSecu,$fonction,$salaire,$superieur){

 	parent::__construct($nom,$prenom,$dateNaiss,$email,$adresse,$ville,$codePostal);
 	$this->setNumSecu($numSecu);
 	$this->setFonction($fonction);
 	$this->setSalaire($salaire);
 	$this->setSuperieur($superieur);
 	
 }

 // ---------------accesseurs-------------
	 public function getNumSecu(){

	 		return $this->_numSecu;
	 	}
	public function getFonction(){

	 		return $this->_fonction;
	 	}
	public function getSalaire(){

	 		return $this->_salaire;
	 	}
	public function getSuperieur(){

	 		return $this->_superieur;
	 	}

	 

 // ---------------mutateurs------------------
	public function setNumSecu(){

	 		return $this->_numSecu;
	 	}
	public function setFonction(){

	 		return $this->_fonction;
	 	}
	public function setSalaire(){

	 		return $this->_salaire;
	 	}
	public function setSuperieur(){

	 		return $this->_superieur;
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

	public function promotion($var){

		return $this->_salaire += $var;
	}
	

	}

}

?>