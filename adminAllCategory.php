<?php
include_once(__DIR__.'/classes/Category.php');
include_once(__DIR__.'/classes/CategoryManager.php');
include_once(__DIR__.'/database/connect-db.php');
require_once getcwd().('/header-login.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$cat = new CategoryManager($db);
$result = $cat->displayAllCat();
$list = "";
require_once getcwd().('/navAdmin.php');?>
<main>
<?php
foreach ($result as $value){
    $list.=
    '
    <form method="POST" action="formUpdateCategory.php">
	<tr>
	<td>'.$value['name'].'</td>
    <td>'.$cat->getNameParentCat($value['parent_id']).'</td>
    <td><input type="hidden" name="idCat" value="'.$value['id'].'"/>
    <input type="submit" class="waves-effect waves-light btn #2e7d32 green darken-3" value="Modifier"></a></td></form>
    <td><form method="POST" action="deleteProduct.php"></td>
	<td><input type="hidden" name="idCat" value="'.$value['id'].'" />
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
    <th>Parent Category</th>
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