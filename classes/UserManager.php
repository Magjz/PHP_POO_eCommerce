<?php
class UserManager{
	
	protected $db;
	protected $name;
	protected $firstName;
	protected $password;
	protected $pass_conf;
	protected $email;
	protected $isAdmin;
	protected $user;

	public function __construct($db, User $user = null)
	{
		$this->db = $db;
		if($user != null){
			$this->user = $user;
			$this->name = $user->getData('name');
			$this->firstName = $user->getData('firstname');
			$this->password  = $user->getData('password');
			$this->pass_conf = $user->getData('password_conf');
			$this->email = $user->getData('email');
			$this->isAdmin = $user->getData('is_admin');
		}
	}


	public function addUser()
	{
			$q_base = $this->db->prepare("INSERT INTO users (name, firstname, password, email, created_at, is_admin) 
			VALUES (:name, :firstName, :passHash, :email, :created_at, :is_admin)");

			$q_base->execute(array(
				':name'=> $this->name,
				':firstName'=> $this->firstName, 
				':passHash' => password_hash($this->password, PASSWORD_BCRYPT), 
				':email' => $this->email, 
				':created_at' => date("Y-m-d"),
				':is_admin' => $this->isAdmin
			));

		$q_base->closeCursor();
		
	}

	public function deleteUser($email)
	{
		$q_base = $this->db->prepare("DELETE FROM users WHERE email = :email");
		$q_base->execute(array(
			':email'=> $email
		));
		$q_base->closeCursor();
		header("Location: adminAllUsers.php");
	}

	public function updateUser($email)
	{
		$testName = $this->user->validName($this->name);
        $testFirstName = $this->user->validFirstName($this->firstName);
        $testEmail = $this->user->validEMail($this->email);
        $testPass  = $this->user->validPassword($this->password, $this->pass_conf); 
        if($testName == false || $testFirstName == false || 
            $testEmail == false || $testPass = false)
                {	
                    echo "<p>Please retry</p>";
                    return false;
                }
            else
            {
			$q_base = $this->db->prepare("UPDATE users SET name = :name, firstname = :firstName, password = :passHash, email = :email, is_admin = :is_admin
			WHERE email = '$email'");
			$q_base->execute(array(
				':name' => $this->name,
				':firstName' => $this->firstName, 
				':passHash' => password_hash($this->password, PASSWORD_BCRYPT), 
				':email' => $this->email,
				':is_admin' => $this->isAdmin	
			));
			$q_base->closeCursor();
			header("Location: adminAllUsers.php");
	}
}
	
	public function showUser($email)
	{
		if ($email != null){
			$q_base = $this->db->prepare("SELECT * FROM users WHERE email = '$email'");
			$q_base->execute();
			$result = $q_base->fetch();
			$q_base->closeCursor();
		return $result;
		}
	}

	public function showAllUsers()
	{
		$q_base = $this->db->prepare("SELECT * FROM users");
		$q_base->execute();
		$result = $q_base->fetchAll();
		$q_base->closeCursor();
		return $result;	
	}
		

}



