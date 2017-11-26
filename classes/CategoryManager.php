<?php
class CategoryManager{
	
	protected $db;
	protected $id;
	protected $name;
	protected $parent_id;
	protected $description;

	public function __construct($db, Category $cat = NULL)
	{
		$this->db = $db;
		if($cat != null){
			$this->id = $cat->getData('id');
			$this->name = $cat->getData('name');
			$this->parent_id = $cat->getData('parent_id');
			$this->description = $cat->getData('description');
		}		
	}

	
	public function addCategory()
	{
		$q_base = $this->db->prepare("INSERT INTO  (name, parent_id) 
		VALUES (:name, :price, :parentId");
		
		$q_base->execute(array(
			':name'=> $product->getData('name'), 
			':price' => $product->getData('price'), 
			':category' => $product->getData('category'), 
			':description' => $product->getData('description')
		));
		
        $q_base->closeCursor();
        
        $q_base = $this->db->prepare('INSERT INTO pictures (');

			echo "<p>Nouveau produit ajouté !</p>";
	}

	public function deleteProduct($id)
	{
		$q_base = $this->db->prepare("DELETE FROM products WHERE id = $id ");
		$q_base->execute(array(
			':id'=> $id
		));
		$q_base->closeCursor();
		header("Location: adminAllProducts.php");
		
		exit();
	}


	public function updateCategory($id)
	{
			$q_base = $this->db->prepare("UPDATE categories SET name = :name, parent_id = :parentId, description = :desc
			WHERE id = '$id'");
			$q_base->execute(array(
				':name' => $this->name,
				':parentId' => $this->parent_id,
				':desc' => $this->description
			));
			$q_base->closeCursor();
			header("Location: adminAllCategory.php");
	}

	public function getNameParentCat($id){
		$q_base = $this->db->prepare("SELECT name FROM categories WHERE id = '$id'");
		$q_base->execute();
		$result = $q_base->fetch(PDO::FETCH_COLUMN, 0);
		$q_base->closeCursor();
		return $result;	
	}

	public function displayCat($id)
	{
		if ($id != null){
			$q_base = $this->db->prepare("SELECT * FROM categories WHERE id = '$id'");
			$q_base->execute();
			$result = $q_base->fetch();
			$q_base->closeCursor();
			return $result;
		}
	}

	public function displayAllCat()
	{
		$q_base = $this->db->prepare("SELECT * FROM categories");
		$q_base->execute();
		$result = $q_base->fetchAll();
		$q_base->closeCursor();
		return $result;	
	}


	public function displayImages()
	{
		$q_base = $this->db->prepare('SELECT picture from pictures');
		$q_base->execute();
		$result = $q_base->fetcAll();
		return $result;
	}



}
