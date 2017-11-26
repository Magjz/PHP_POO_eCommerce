<!DOCTYPE>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<?php
require ('../classes/User.php');
require ('../classes/UserManager.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$user = new UserManager($db);
$result = $user->showUser($_POST['emailUser']);
?>
<div class="row">
<form method="POST" action="updateUser.php" class="col s12">
<div class ="row">
<div class="input-field col s10">
    <i class="material-icons prefix">account_circle</i><br>
    <input value="<?php echo $result['name'] ?>" name="name" type="text" class="validate"/>
    <label for="name">Name</label>
</div>
</div>
<div class ="row">
<div class="input-field col s12">
    <i class="material-icons prefix">account_circle</i><br>
    <input value="<?php echo $result['firstname'] ?>" id="firstname" name="firstname" type="text" class="validate"/>
    <label for="firstname">Firstname</label>
</div>
</div>
<div class ="row">
<div class="input-field col s12">
    <i class="material-icons prefix">mail</i><br>
    <input value="<?php echo $result['email'] ?>" id="email" name="email" type="text" class="validate"/>
    <label for="email">Email</label>
</div>
</div>
<div class ="row">
<div class="input-field col s12">
    <i class="material-icons prefix">vpn_key</i><br>
    <input id="password" name="password" type="password" class="validate"/>
    <label for="password">Password</label>
</div>
</div>
<div class ="row">
<div class="input-field col s12">
    <i class="material-icons prefix">vpn_key</i><br>
    <input id="password" name="password_Conf" type="password" class="validate"/>
    <label for="password">Password</label>
</div>
</div>
<div class ="row">
<div class="input-field col s12">
    <i class="material-icons prefix">vpn_key</i><br>
    <input value="<?php echo $result['is_admin'] ?>" id="admin" name="admin" type="text" class="validate"/>
    <label for="admin">isAdmin</label>
</div>
</div>

<br><br>
<input type="submit" class="waves-effect waves-light btn #2e7d32 green darken-3" value="Modifier">
</form>
</div>



<!--
<form method="POST" action="updateUser.php">
<input type="text" name="name" value="<?php echo $result['name'] ?>"/><br>
<input type="text" name="firstname" value="<?php echo $result['firstname'] ?>"/><br>
<input type="text" name="email" value="<?php echo $result['email'] ?>"/><br>
<input type="text" name="password" value="<?php echo $result['password'] ?>"/><br>
<input type="text" name="password_Conf" value="<?php echo $result['password'] ?>"/><br>
<input type="text" name="admin" value="<?php echo $result['is_admin'] ?>"/><br>
<input type="submit" value="Modifier">-->
</body>
</html>