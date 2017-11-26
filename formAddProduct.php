<?php
require_once(__DIR__.'/classes/Product.php');
require_once(__DIR__.'/classes/ProductManager.php');
require_once(__DIR__.'/database/connect-db.php');
require_once getcwd().('/header-login.php');



$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
 
$form = new Product($_POST);
$newProduct = new ProductManager($db, $form);	

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$newProduct->addProduct($_POST['category_id']);	
	// echo "<p>Nouveau produit ajouté !</p>";
}


//Début du code de la page
require_once getcwd().('/navAdmin.php');?>
<main>
    <div class="row float-left">
    <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
	<?php
		echo $form->input_text('name');
		echo $form->input_text('price');
		echo $form->input_textArea('description');?>

		<select class="browser-default col s12" name="category_id">
		<?php 
		$cat= $newProduct->displayAllCat();
		foreach ($cat as $val){
			echo '<option value="'.$val['id'].'">'.$val['name'].'</option>';
		}?>
	
		</select>
		<?php
		echo $form->submit();
	?>
    </form>

</main>
</body>
</html>