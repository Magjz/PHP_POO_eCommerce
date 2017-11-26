<?php
require ('../classes/User.php');
require ('../classes/UserManager.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$user = new UserManager($db);
$result = $user->deleteUser($_POST['emailUser']);

?>