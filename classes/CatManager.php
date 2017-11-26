<?php

include_once(__DIR__.'/database/connect-db.php');

class CatManager{
	
	protected $db;
	protected $name;
	protected $parentId;
	protected $description;

	public function __construct($db, Cat $cat = null)
	{
		$this->db 			= $db;
		$this->name 		= $user->getData('name');
		$this->parentId 	= recupParentCatId($user->getData('parent_name'));
		$this->description 	= $user->getData('description');
	}
	
	// Récupération du nom de la catégorie du parent_Id
	public function recupParentCatId($name){
		$q_base = $this->db->prepare("SELECT id FROM categories WHERE name = '$name'");
		$q_base->execute();
		$result = $q_base->fetch();
		return $result;
	}

	
	public function addCat()
	{
		$q_base = $this->db->prepare("INSERT INTO categories (name, parent_id, description, created_at) VALUES (:name, :parent_id, :desc, :created_at");
		$q_base->execute(array(
			':name' => $this->name,
			':parent_id' => $this->parentId, 
			':desc' => $this->description,  
			':created_at' => date("Y-m-d"),
			));
		$q_base->closeCursor();
		echo "<p>Categorie created</p>";
	}

	public function deleteCat(){
		$q_base = $this->db->prepare("DELETE FROM categories WHERE name = :name ");
		$q_base->execute(array(
			':name'=> $this->name
		));
		$q_base->closeCursor();
		echo "<p>Categorie delete</p>";
	}

	public function updateCat(){
		$q_base = $this->db->prepare("UPDATE categorie SET name = :name, parent_id = :parentId, description = :desc");
		$q_base->execute(array(
			':name'=> $name,
			':firstName'=> $firstName, 
			':passHash' => password_hash($password, PASSWORD_BCRYPT), 
			':email' => $email, 
			':created_at' => date("Y-m-d"),
			':is_admin' => $isAdmin	
			));
			$q_base->closeCursor();
			echo "<p>User updated</p>";
		}
	}

		public function showCat(){
		$q_base = $this->db->prepare("SELECT * FROM categories WHERE name = $this->name");
		$q_base->execute();
		$result = $q_base->fetch();
		echo $result;
		$q_base->closeCursor();	
	}

		public function showAllUser(){
		$q_base = $this->db->prepare("SELECT * FROM categories");
		$q_base->execute();
		$result = $q_base->fetchAll();
		foreach ($result as $value){
    		$list.='<li>'.$value.'</li>';
    	}
    	echo '<ul>'.$list.'</ul>';
		$q_base->closeCursor();	
	}

}
