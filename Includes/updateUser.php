<?php
require ('../classes/User.php');
require ('../classes/UserManager.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$form = new User($_POST);
$user = new UserManager($db, $form);
$user->updateUser($form->getData('email'));

?>