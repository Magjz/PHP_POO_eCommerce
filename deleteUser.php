<?php
require_once getcwd().('/classes/User.php');
require_once getcwd(). ('/classes/UserManager.php');
require_once getcwd(). ('/database/connect-db.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$user = new UserManager($db);
$result = $user->deleteUser($_POST['emailUser']);

?>