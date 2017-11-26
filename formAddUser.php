<?php
require_once(__DIR__.'/classes/User.php');
require_once(__DIR__.'/classes/UserSubscription.php');
require_once(__DIR__.'/database/connect-db.php');
require_once getcwd().('/header-login.php');



$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
 
$form = new User($_POST);
$userInscription = new UserSubscription($db, $form);
$userInscription->subscribe();

//Début du code de la page
require_once getcwd().('/navAdmin.php');?>
<main>
    <div class="row float-left">
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

</main>
</body>
</html>