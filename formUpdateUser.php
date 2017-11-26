<?php
require_once(__DIR__.'/classes/User.php');
require_once(__DIR__.'/classes/UserManager.php');
require_once(__DIR__.'/database/connect-db.php');
require_once getcwd().('/header-login.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$user = new UserManager($db);
$result = $user->showUser($_POST['emailUser']);


//Début du code de la page
require_once getcwd().('/navAdmin.php');?>
<main>
    <div class="row float-left">
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
            <div>
<i class="material-icons prefix">border_color</i><br>
<label for="cat">Droits d'administration</label>
<select class="browser-default col s12" name="is_admin">
<option value="<?php $result['is_admin'] ?>" disabled selected><?php echo $result['is_admin'] ?></option>
<option value= 1>Oui</option>
<option value= 0>Non</option>
</select>
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
<main>
</body>
</html>