<?php
require ('../classes/User.php');
require ('../classes/UserSubscription.php');


$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
 
$form = new User($_POST);
$userInscription = new UserSubscription($db, $form);
$userInscription->subscribe();
?>

<form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
	<?php
		echo $form->input_text('name');
		echo $form->input_text('firstname');
		echo $form->input_text('email');
		echo $form->input_pass('password');
		echo $form->input_pass('password_Conf');
		echo $form->submit();
	?>
</form>