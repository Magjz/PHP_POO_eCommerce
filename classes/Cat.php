<?php 
// namespace GlobalForm;

require 'Form.php';
/**
* Create a user with his data passed in form. This class validate the data. 
* A user object contains all his checked data 
* and can be used in interraction with other objects? 
*/
class Cat extends Form 
{	
	const NAME_INVALID = "<p>Invalid name</p>";
	const DESC_INVALID = "<p>Invalid description</p>";
/**
 * Param : string $name
 * Return : True if the string is OK | False if the name is not oK. 
 * An error message can be displayed if the input is incorrect, so the user can give good infos. 
 */
	public function validName($name){ 
		if(empty($name) || (strlen($name) < 3 && strlen($name) > 20))
		{
			echo $this->errors[] = self::NAME_INVALID;
			return false;
		}
		else
			return true;
	}

	public function validDesc($firstname){ 
		if(empty($firstname) || (strlen($firstname) < 3 && strlen($firstname) > 20))
		{
			echo $this->errors[] = self::FIRSTNAME_INVALID;
			return false;
		}
		else
			return true;
	}
}