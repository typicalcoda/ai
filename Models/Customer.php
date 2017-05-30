<?php
class Customer{
	
	public $id;
	public $is_admin;
	public $firstname;
	public $lastname;
	public $email;
	public $password;


	public function attempt ($email,$pass){
		global $db;
		$result = $db->prepare("SELECT * FROM customers WHERE email='$email' AND password='$pass' AND is_admin=0 LIMIT 1"); 

		$result->execute();

		$row = $result->fetch();

		if($row){
			$this->id 			= $row[0];
			$this->is_admin 	= $row[1];
			$this->firstname 	= $row[2];
			$this->lastname 	= $row[3];
			$this->email  		= $row[4];
			$this->password 	= $row[5];

			$_SESSION['User'] = serialize($this);

			return true;
		}

		return false;

	}

}
class Admin{
	
	public $id;
	public $firstname;
	public $lastname;
	public $email;
	public $password;


	public function attempt ($email,$pass){
		global $db;
		$result = $db->prepare("SELECT * FROM customers WHERE email='$email' AND password='$pass' AND is_admin=1 LIMIT 1"); 

		$result->execute();

		$row = $result->fetch();

		if($row){
			$this->id 			= $row[0];
			$this->is_admin 	= $row[1];
			$this->firstname 	= $row[2];
			$this->lastname 	= $row[3];
			$this->email  		= $row[4];
			$this->password 	= $row[5];

			$_SESSION['Admin'] = serialize($this);

			return true;
		}

		return false;

	}

}
?>