<?php

abstract class Personne{
	
	protected $_nom;
	protected $_prenom;
	protected $_email;
	protected $_adresse;
	protected $_ville;
	protected $_codePostal;
	protected $_id;


	// constructeur------------

 function __construct($nom,$prenom,$email,$adresse,$ville,$codePostal){

 	$this->_nom = $nom;
 	$this->_prenom = $prenom;
 	$this->_email = $email;
 	$this->_adresse = $adresse;
 	$this->_ville = $ville;
 	$this->_codePostal = $codePostal;

 }

 // ---------------accesseurs-------------

	 public function _get($attr){

	 	return $this->$attr;

	 }


 // ---------------mutateurs------------------
	public function _set($val, $attr){

		return $this->$attr = $val;
		
	}




 // ---------------méthodes-----------------

	// public function modifier_info();



}

?>