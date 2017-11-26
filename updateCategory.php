<?php
include_once(__DIR__.'/classes/Category.php');
include_once(__DIR__.'/classes/CategoryManager.php');
include_once(__DIR__.'/database/connect-db.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$form = new Category($_POST);
$cat = new categoryManager($db, $form);

$cat->updateCategory($form->getData('id'));
?>