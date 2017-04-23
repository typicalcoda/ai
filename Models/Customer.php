<?php
class Customer{
	
	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $password;


	public function attempt ($email,$pass){
		global $db;
		$result = $db->prepare("SELECT * FROM customers WHERE email='$email' AND password='$pass' LIMIT 1"); 

		$result->execute();

		$row = $result->fetch();

		if($row){
			$this->id 			= $row[0];
			$this->firstname 	= $row[1];
			$this->lastname 	= $row[2];
			$this->email  		= $row[3];
			$this->password 	= $row[4];

			$_SESSION['User'] = serialize($this);

			return true;
		}

		return false;

	}

}
?>