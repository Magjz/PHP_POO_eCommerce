<?php

require_once getcwd().('/classes/Product.php');
require_once getcwd().('/classes/ProductManager.php');
require_once getcwd().('/database/connect-db.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$prod = new ProductManager($db);
$result = $prod->deleteProduct($_POST['idProduct']);

?>