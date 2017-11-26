<?php
require_once getcwd().('/database/connect-db.php');
require_once getcwd().('/classes/cookie.php');
require_once getcwd().('/classes/User.php');
require_once getcwd().('/classes/UserConnect.php');
include_once getcwd().('/header-login.php');
$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$user = new User($_POST);


if($_SERVER['REQUEST_METHOD'] == 'POST' && 
$user->ValidEmail($user->getData('email')))
{	
	$userConnect = new UserConnect($db, $user);
	$userConnect->login($user);
}
?>
<body class="login">
	<header class="header-login margin-top-200"> 
		<a href="#!" class="brand-logo left"><img  class="responsive-img"></a>        
    </header>
		<div class="container">	 
			<h1 class='center'>Connectez-vous</h1>
			<div class="row padding-top-30">
				<div class="card-panel grey lighten-5 col l6 offset-l3 m6 offset-m3 s10 offset-s1">
					<form class="col s12"method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
					<?php
						echo "<div class='row'>{$user->input_text('email')}</div>";
						echo "<div class='row'>" . $user->input_pass('password') ."</div>";
						echo "<div class='row'>" .$user->submit() ."</div>";
							?>
					</form>
				</div>
			</div>
			<div class="row padding-top-30">
				<div class="card-panel grey lighten-5 col l6 offset-l3 m6 offset-m3 s10 offset-s1">
				<p class"center flow-text" style="text-align:center; font-weight:bold; font-size:20px">Pas encore inscrit ?</p>
				
					<div class="lime btn waves-effect waves-light center" style="margin-bottom:30px; display:inline-block">
						<a class"lien" href="inscription.php">S'inscrire</a></div>
					</div>
			</div>


