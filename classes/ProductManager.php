<?php
class ProductManager{
	
	protected $db;
	protected $id;
	protected $name;
	protected $price; 
    protected $descritpion;
	protected $picture;
	protected $product;

	public function __construct($db, Product $product = null)
	{
		$this->db = $db;
		if($product != null){
			$this->id = $product->getData('id');
			$this->name = $product->getData('name');
			$this->price = $product->getData('price');
			$this->category = $product->getData('category_id');
			$this->description = $product->getData('description');
			$this->picture = $product->getData('picture');
			$this->product = $product;
		}
	}

	public function addProduct($cat_id)
	{ 
		$q_base = $this->db->prepare("INSERT INTO products (name, price, category_id, description) 
		VALUES (:name, :price, :category, :description)");
		
		$q_base->execute(array(
			':name'=> $this->product->getData('name'), 
			':price' => $this->product->getData('price'), 
			':category' => $cat_id,
			':description' => $this->product->getData('description')
		));
		
        $q_base->closeCursor();
	}

	public function deleteProduct($id)
	{
		$q_base = $this->db->prepare("DELETE FROM products WHERE id = :id ");
		$q_base->execute(array(
			':id'=> $id
		));
		$q_base->closeCursor();
		header("Location: adminAllProducts.php");
		
		exit();
	}


	public function updateProduct($id)
	{
			$q_base = $this->db->prepare("UPDATE products SET name = :name, price = :price, category_id = :catId, description = :desc
			WHERE id = '$id'");
			$q_base->execute(array(
				':name' => $this->name,
				':price' => $this->price,  
				':catId' => $this->category,
				':desc' => $this->description	
			));
			$q_base->closeCursor();
			header("Location: adminAllProducts.php");
	}

	public function displayOneProduct($id)
	{
		if ($id != null){
			$q_base = $this->db->prepare("SELECT * FROM products WHERE id = '$id'");
			$q_base->execute();
			$result = $q_base->fetch();
			$q_base->closeCursor();
			return $result;
		}
	}

	public function getNameProdCat($id){
		$q_base = $this->db->prepare("SELECT name FROM categories WHERE id = '$id'");
		$q_base->execute();
		$result = $q_base->fetch(PDO::FETCH_COLUMN, 0);
		$q_base->closeCursor();
		return $result;	
	}

	public function displayAllCat()
	{
		$q_base = $this->db->prepare("SELECT * FROM categories");
		$q_base->execute();
		$result = $q_base->fetchAll();
		$q_base->closeCursor();
		return $result;	
	}

	public function displayAllProduct()
	{
		$q_base = $this->db->prepare("SELECT * FROM products");
		$q_base->execute();
		$result = $q_base->fetchAll();
		$q_base->closecursor();
	
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
