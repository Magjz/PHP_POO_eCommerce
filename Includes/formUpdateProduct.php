<!DOCTYPE>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<?php
require ('../classes/Product.php');
require ('../classes/ProductManager.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$prod = new ProductManager($db);
$result = $prod->displayOneProduct($_POST['idProduct']);
?>
<div class="row">
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
    <input value="<?php echo $result['price'] ?>" id="firstname" name="firstname" type="text" class="validate"/>
    <label for="firstname">Price</label>
</div>
</div>
<div class ="row">
<?php
$cat = $prod->displayAllCat();
$listCat = "";
foreach ($cat as $val){
    var_dump($val);
    
    $listCat.=
    '<option value="'.$val['id'].'">'.$prod->getNameProdCat($val['category_id']).'</option>';
}
echo 
'<select class="browser-default col s5">
    <option value="" disabled selected>'.$prod->getNameProdCat($result['category_id']).'</option>
    '.$listCat.'
</select>';
var_dump($listCat);
?>
</div>
<br><br>
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
</body>
</html>