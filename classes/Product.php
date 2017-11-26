<?php 
require 'Form.php';
/**
* Create a product with his data passed in a form. This class validate the data. 
* A product object contains all his checked data 
* and can be used in interraction with other objects. 
*/
class Product extends Form 
{	
	const NAME_INVALID        = "<p>Invalid name</p>";
	const DESCRIPTION_INVALID = "<p>Invalid Description</p>";
	const PRICE_INVALID       = "<p>Invalid price, please enter a number</p>";
    const CAT_INVALID         = "<p>Invalid product category</p>";
    const PICTURE_INVALID     = "<p>Invalid picture, only jpeg, jpg, png formats are accepted</p>";
    
	
/**
 * Param : string $name
 * Return : True if the string is OK | False if the name is not oK. 
 * An error message can be displayed if the input is incorrect, so the user can give good infos. 
 */
	public function validName($name)
	{ 
		if(empty($name) || (strlen($name) < 3 && strlen($name) > 20))
		{
			echo $this->errors[] = self::NAME_INVALID;
			return false;
		}
		else
			return true;
	}
/**
 * Param : string $name
 * Return : True if the string is OK | False if the name is not oK. 
 * An error message can be displayed if the input is incorrect, so the user can give good infos. 
 */
	// public function validDescription($description)
	// { 
	// 	if(empty($description) || (strlen($description) < 10)
	// 	{
	// 		echo $this->errors[] = self::DESCRIPTION_INVALID;
	// 		return false;
	// 	}
	// 	else
	// 		return true;
	// }
		
/**
 * Param : int $price
 * Return : bool. True if the price is valid, false if not.
 */
	public function validPrice($price)
	{
		if(empty($price) || !is_int($price))
		{
			echo $this->errors[] = self::PRICE_INVALID;
			return false; 
		}
		else
			return true;
	}

/**
 * Param : string $cat
 * Return : bool. True if the cat is valid, false if not.
 */
    public function validCategory($cat)
     {
         if(empty($cat))
         {
             echo $this->errors[] = self::CAT_INVALID;
             return false; 
         }
         else
            return true;
     }
/**
 * Param : file $pic
 * Return : bool. True if the format pic is valid. False if not.
 */
    //  public function validPic($pic)
    //  {
    //     if(isset($_FILES['avatar']))
    //     { 
    //          $dossier = 'upload/';
    //          $fichier = basename($_FILES['avatar']['name']);
    //          if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
    //          {
    //               echo 'Upload effectué avec succès !';
    //          }
    //          else //Sinon (la fonction renvoie FALSE).
    //          {
    //               echo 'Echec de l\'upload !';
    //          }
    //     }
    //  }
}