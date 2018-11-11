<?php


include_once 'Personne.php';

class Client extends Personne{
	
	protected $_dateCrea;
	protected $_pwd;
	protected $_id;
	private $_bdd;
	

	// constructeur------------

 	function __construct($nom,$prenom,$email,$adresse,$ville,$codePostal,$dateCrea,$pwd){

 	parent::__construct($nom,$prenom,$email,$adresse,$ville,$codePostal);
 	$this->_pwd = $pwd;
 	$this->_dateCrea = $dateCrea;
 	
 	
 	}

 // ---------------accesseurs-------------
	public function getPwd(){

 	return $this->_pwd;
	 
	 }
 // ---------------mutateurs------------------
	public function setDateCrea()
	{

 	return $this->_dateCrea;

 	}

	public function setPwd()
	{

 	return $this->_pwd;
	 
 	}


 // ---------------méthodes-----------------

	public function new()
	{

		$db = Database::connect();

		 $newPwd = password_hash($this->_pwd, PASSWORD_DEFAULT);
		

		$statement = $db->prepare("INSERT INTO users
        	(user_last, user_first, user_email, user_address, user_pc, user_city, user_createDate, user_pwd)
        	VALUES
			(:unom, :uprenom, :umail, :uadresse, :ucp, :uville, :udate, :upass)");

							$statement->bindParam(':unom',$this->_nom);
							$statement->bindParam(':uprenom',$this->_prenom);
							$statement->bindParam(':umail',$this->_email);
							$statement->bindParam(':uadresse',$this->_adresse);
							$statement->bindParam(':ucp',$this->_codePostal);
							$statement->bindParam(':uville',$this->_ville);
							$statement->bindParam(':udate', $this->_dateCrea);
							$statement->bindParam(':upass',$newPwd);
        $statement->execute();
   //      echo "<pre>";
 		// $statement->debugDumpParams();
 		// echo "</pre>";
       header('Location:login.php?register=success');

	}

	static function read()
	{
		
                   
	}

	
	public function update()
	{

	}

	public function delete()
	{

	}
	// ---Methode authentification------------

	public static function authentication()
	{
		$db = Database::connect();

		$email = $_POST['user_email'];
		$pwd = $_POST['user_pwd'];

		$statement = $db->query("SELECT * FROM users WHERE user_email='$email';");
		$result =  $statement->fetch();
		

		if($result < 1){

			$_SESSION['errors'] = $errors;
			header('Location:login.php?login=invalid');
			exit();

			} else {

			// comparaison entre le pwd entré dans le formulaire de login (champ name $pwd) et le pwd trouvé dans la database ($result)

			// $verifyPwd = password_verify($pwd, $result['user_pwd']);

				if(!$pwd){

				$errors = "mot de passe incorrect";	
				$_SESSION['errors'] = $errors;
				header('Location:login.php?password=false');

					} else {

					$_SESSION['u_last'] = $result['user_last'];
					$_SESSION['u_first'] = $result['user_first'];
					$_SESSION['u_email'] = $result['user_email'];
					$_SESSION['u_address'] = $result['user_address'];
					$_SESSION['u_pc'] = $result['user_pc'];
					$_SESSION['u_city'] = $result['user_city'];
					$_SESSION['u_pwd'] = $result['user_pwd'];

					header('Location:index.php?login=success');
								

					return $result;	
					}
				}		
			}
		}
	
?>