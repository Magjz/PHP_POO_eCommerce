<?php
require_once getcwd().('/database/connect-db.php');
require_once getcwd().('/classes/UserSubscription.php');
require_once getcwd().('/classes/User.php');
include_once ('header-login.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
 
$form = new User($_POST);
$userInscription = new UserSubscription($db, $form);
if($userInscription->subscribe())
	header("Location: index.php");
?>
<body class="login">
<header class="header-login margin-top-200"> 
	<a href="#!" class="brand-logo left"><img  class="responsive-img"></a>      
 </header>
<div class="container">	 
<h1 class='center'>Inscrivez-vous</h1>
<div class="row padding-top-30">
	<div class="card-panel grey lighten-5 col l6 offset-l3 m6 offset-m3 s10 offset-s1">
		<form class"padding-bot-30" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
			<?php
				echo $form->input_text('name');
				echo $form->input_text('firstname');
				echo $form->input_text('email');
				echo $form->input_pass('password');
				echo $form->input_pass('password_Conf');
				echo $form->submit();
			?>
		</form>
	</div>
</div>

