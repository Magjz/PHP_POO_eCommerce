<?php

class UserConnect
{	protected $admin = false;
	protected $db; 
	protected $email; 
	protected $password;
	protected $user;

	public function __construct($db, User $user)
	{
		$this->db = $db; 
		$this->email = $user->getData('email');
		$this->password = $user->getData('password');
		$this->user = $user;
	}
/**
 * Login function. This function log on a user if his password is correct [ ==> call chekUser()]. 
 * If yes, it creates $_SESSION and checks if the user is admin 
 * [ ==> call checkAdmin()]. If the user is amdin, create $_SESSION['admin'] on true. Else do nothing. ))
 */
	public function login(User $user)
	{
		$user = $this->checkUser($this->email, $this->password);
	
		if($this->checkUser($this->email, $this->password)){
			$this->user = $user;
			$_SESSION['user_id'] = $user['id'];
			$_SESSION['name'] = $user['name'];
			$_SESSION['email'] = $user['email'];
				if ($this->checkAdmin()){
					$_SESSION['admin'] = true;
				}
			$this->redirect();
			//return $_SESSION;
		}
		echo "<p>L'utilisateur n'existe pas !</p>";
		return NULL;
	}

/**
 * Check in DB if the password given by the user is correct. If yes, retrun true, else return false.  
 */
	public function checkUser($email, $password)
	{	
		$q_base = $this->db->prepare('SELECT * FROM users WHERE email = :email');
		$q_base->execute(array(
			':email' => $email
		));
		$result = $q_base->fetch();
		if($result == true){ 
			$validPass = password_verify($password, $result['password']);
			if($validPass == true)
				return $result;
		}else{
			echo "<p>Email incorrect ! </p>";
			return false;
		}
	}

/**
 * Check if the user who try to connect is admin. If he's admin, return true, else return false. 
 */
	public function checkAdmin()
	{
		$q_base = $this->db->prepare('SELECT is_admin FROM users WHERE email = :email');
		$q_base->execute(array(
			':email' => $this->email
		));
		$userAdmin = $q_base->fetch();
	
		return ($userAdmin == 0) ? false : true;
	}

	public function redirect()
	{
		header("Location: index.php");
		
	}
		
}



