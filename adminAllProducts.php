<?php
include_once(__DIR__.'/classes/Product.php');
include_once(__DIR__.'/classes/ProductManager.php');
include_once(__DIR__.'/database/connect-db.php');
require_once getcwd().('/header-login.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$prod = new ProductManager($db);
$result = $prod->displayAllProduct();
$list = "";
require_once getcwd().('/navAdmin.php');?>
<main>
<?php
foreach ($result as $value){
    $list.=
    '
    <form method="POST" action="formUpdateProduct.php">
	<tr>
	<td>'.$value['name'].'</td>
    <td>'.$value['price'].'</td>
    <td>'.$prod->getNameProdCat($value['category_id']).'</td>
    <td>'.$value['description'].'</td>
    <td><input type="hidden" name="idProduct" value="'.$value['id'].'"/>
    <input type="submit" class="waves-effect waves-light btn #2e7d32 green darken-3" value="Modifier"></a></td></form>
    <td><form method="POST" action="deleteProduct.php"></td>
	<td><input type="hidden" name="idProduct" value="'.$value['id'].'" />
    <input type="submit" class="waves-effect waves-light btn #c62828 red darken-3" value="Supprimer"></a></td>
    </form>
	</tr>';
    }
    echo 
    '
    <div class="row">
    <center>
    <div class="col s7 centered">
    <table class="highlight centered bordered"><thead>
    <tr>
    <th>Name</th>
    <th>Price</th>
    <th>Category</th>
    <th>Description</th>
    <th></th>
    <th></th>
    <th></th>
    </tr>

    </thead>
    <tbody>
    '.$list.'
    </tbody>
    </table>
    </div>
    </center>
    </div>';
?>
</main>
</body>
</html>