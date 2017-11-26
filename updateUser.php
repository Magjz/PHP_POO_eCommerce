<?php
include_once(__DIR__.'/classes/User.php');
include_once(__DIR__.'/classes/UserManager.php');
include_once(__DIR__.'/database/connect-db.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$form = new User($_POST);
$user = new UserManager($db, $form);
$user->updateUser($form->getData('email'));
?>