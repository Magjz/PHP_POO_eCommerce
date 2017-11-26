<?php
include_once(__DIR__.'/classes/Product.php');
include_once(__DIR__.'/classes/ProductManager.php');
include_once(__DIR__.'/database/connect-db.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$form = new Product($_POST);
$prod = new ProductManager($db, $form);
$prod->updateProduct($form->getData('id'));
?>