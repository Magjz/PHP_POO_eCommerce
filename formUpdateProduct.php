<!DOCTYPE>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<?php
include_once(__DIR__.'/classes/Product.php');
include_once(__DIR__.'/classes/ProductManager.php');
include_once(__DIR__.'/database/connect-db.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$prod = new ProductManager($db);
$result = $prod->displayOneProduct($_POST['idProduct']);
require_once getcwd().('/navAdmin.php');?>

<main>
<div class="row float-left">
<form method="POST" action="updateProduct.php" class="col s12">
<div class ="row">
<div class="input-field col s10">
    <i class="material-icons prefix">account_circle</i><br>
    <input value="<?php echo $result['name'] ?>" name="name" type="text" class="validate"/>
    <label for="name">Name</label>
</div>
</div>
<div class ="row">
<div class="input-field col s12">
    <i class="material-icons prefix">account_circle</i><br>
    <input value="<?php echo $result['price'] ?>" id="price" name="price" type="text" class="validate"/>
    <label for="price">Price</label>
</div>
</div>
<div class ="row">
<div class="input-field col s12">
    <i class="material-icons prefix">account_circle</i><br>
     <textarea id="textarea1" class="materialize-textarea" name="description"><?php echo $result['description'] ?></textarea>
    <label for="textarea1">Description</label>
</div>
</div>
<div>
<i class="material-icons prefix">account_circle</i><br>
<label for="cat">Category</label>
<?php
$cat = $prod->displayAllCat();
$listCat = "";
foreach ($cat as $val){
    $listCat.=
    '<option value="'.$val['id'].'">'.$prod->getNameProdCat($val['id']).'</option>';
}
echo 
' 
<select class="browser-default col s12" name="category_id">
    <option value="" disabled selected>'.$prod->getNameProdCat($result['category_id']).'</option>
    '.$listCat.'
</select>';
?>
</div>
<br><br>
<input type="hidden" name="id" value="<?php echo $result['id'] ?>" />
<input type="submit" class="waves-effect waves-light btn #2e7d32 green darken-3" value="Modifier">
</form>
</div>



<!--
<form method="POST" action="updateUser.php">
<input type="text" name="name" value="<?php echo $result['name'] ?>"/><br>
<input type="text" name="firstname" value="<?php echo $result['firstname'] ?>"/><br>
<input type="text" name="email" value="<?php echo $result['email'] ?>"/><br>
<input type="text" name="password" value="<?php echo $result['password'] ?>"/><br>
<input type="text" name="password_Conf" value="<?php echo $result['password'] ?>"/><br>
<input type="text" name="admin" value="<?php echo $result['is_admin'] ?>"/><br>
<input type="submit" value="Modifier">-->
<main>
</body>
</html>