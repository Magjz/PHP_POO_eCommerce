<?php
// namespace GlobalForm;

/**
* Permet de générer un formulaire d'inscription
*/
class Form
{
	protected $errors = array(); // Get error messages in array
	protected $data; // Get form data in array

	public $surround = 'div class="input-field col s12"'; // Use in surround() to surround elements of form


	public function __construct($data = array())
	{
		$this->data = $data;
	}
/**
 * Param : int or string $index. Represents the element passed in $_POST or $_GET
 * Return : Value of the array at the index passed
 */
	public function getData($index)
		{
			return isset($this->data[$index]) ? htmlspecialchars($this->data[$index]) : NULL;
		}

/**
* Param : $html
* Return : Surround form element. Tag can be changed. 
*/
	private function surround($html)
	{
		return "<{$this->surround}>{$html}</{$this->surround}>";
	}
/**
* Param : string $name
* Return : Generates a form input of type texte
*/
	public function input_text($name)
	{
		return $this->surround('<input type="text" name="'.$name .'"class="validate" placeholder="Enter your ' .$name.'">');	
	}

/**
* Param : string $name
* Return : Generates a form input of type password
*/
	public function input_pass($name)
	{
		return $this->surround('<input type="password" name="'.$name .'" class="validate" placeholder="Enter your ' .$name.'">');	
	}
/**
* Param : string $name, string $text
* Return : Generates a form input checkbox. $name is put in attribute 'name = $name' 
* $text is the text displayed beside the ckeckbox
*/
	public function input_checkBox($name, $text)
	{
		return $this->surround($text . '<input type="checkbox" name="'.$name .'" class="filled-in" id="filled-in-box" placeholder="Enter your ' .$name.'">');	
	}
/**
* Param : string $text
* Return : Generates a form textarea
*/
	public function input_textArea($text)
	{
		return $this->surround('<textarea name="'.$text .'"  class="materialize-textarea" placeholder="Enter your ' .$text.'"></textarea>');	
	}
/**
* Param : string $file
* Return : Generates a form input to upload file 
*/
	public function input_file($file)
	{
		return $this->surround($text . '<input type="hidden" name="MAX_FILE_SIZE" value="12345" />
		<input type="file" name="'.$name .'" placeholder="Upload your ' .$name.'"> ');	
	}

	/**
	* Param : string $file
	* Return : Generates a form input to upload file 
	*/
		public function input_search($search)
		{
			return $this->surround('<input type="search" name="'.$search .'" placeholder="Enter Keyword"> ');	
		}

/**
* Return : Submit button
*/
	public function submit()
	{
		return  $this->surround('<button class="lime btn waves-effect waves-light center right">
		<input type="submit" name="submit" value="Submit"><i class="material-icons right">send</i></button>');

	}

	public function errors()
	{
		return $this->errors;
	}

	
}	

	