<?php 
// namespace GlobalForm;

require 'Form.php';
/**
* Create a user with his data passed in form. This class validate the data. 
* A user object contains all his checked data 
* and can be used in interraction with other objects? 
*/
class User extends Form 
{	
	const NAME_INVALID      = "<p class='center flow-text'>Invalid name</p>";
	const FIRSTNAME_INVALID = "<p class='center flow-text'>Invalid FirstName</p>";
	const EMAIL_INVALID     = "<p class='center flow-text'>Invalid email</p>";
	const PASS_INVALID      = "<p class='center flow-text'>Invalid password or password confirmation</p>";
	
/**
 * Param : string $name
 * Return : True if the string is OK | False if the name is not oK. 
 * An error message can be displayed if the input is incorrect, so the user can give good infos. 
 */
	public function validName($name)
	{ 
		if(empty($name) || strlen($name) < 3 || strlen($name) > 20)
		{
			echo $this->errors[] = self::NAME_INVALID;
			return false;
		}
		else
			return true;
	}

	public function validFirstName($firstname)
	{ 
		if(empty($firstname) || strlen($firstname) < 3 || strlen($firstname) > 20)
		{
			echo $this->errors[] = self::FIRSTNAME_INVALID;
			return false;
		}
		else
			return true;
	}
		

	public function validEmail($email)
	{
		if(empty($email) || 
			!preg_match('#^[a-z0-9A-Z._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#', $email))
		{
			echo $this->errors[] = self::EMAIL_INVALID;
			return false; 
		}
		else
			return true;
	}


	public function validPassword($password, $password_conf)
	{
		if(empty($password) || 
			empty($password_conf) || 
		    strlen($password) < 3 ||
			strlen($password_conf) < 3 ||
			$password != $password_conf)
		{
			echo $this->errors[] = self::PASS_INVALID;
			return false;
		}
			return true;
	}
}