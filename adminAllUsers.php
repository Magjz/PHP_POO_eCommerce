<?php
include_once(__DIR__.'/classes/User.php');
include_once(__DIR__.'/classes/UserManager.php');
include_once(__DIR__.'/database/connect-db.php');
require_once getcwd().('/header-login.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$users = new UserManager($db);
$result = $users->showAllUsers();
$list = "";
require_once getcwd().('/navAdmin.php');?>
<main>
    <?php
foreach ($result as $value){
    $list.=
    '
    <form method="POST" action="formUpdateUser.php">
	<tr>
	<td>'.$value['name'].'</td>
    <td>'.$value['firstname'].'</td>
    <td>'.$value['email'].'</td>
    <td>'.$value['is_admin'].'</td>
    <td><input type="hidden" name="emailUser" value="'.$value['email'].'"/>
    <input type="submit" class="waves-effect waves-light btn #2e7d32 green darken-3" value="Modifier"></a></td></form>
    <td><form method="POST" action="deleteUser.php"></td>
	<td><input type="hidden" name="emailUser" value="'.$value['email'].'" />
    <input type="submit" class="waves-effect waves-light btn #c62828 red darken-3" value="Supprimer"></a></td>
    </form>
	</tr>';
    }
    echo 
    '
    <div class="row">
    <center>
    <div class="col s7 centered">
    <table class="highlight centered bordered"><thead>
    <tr>
    <th>Name</th>
    <th>Firstname</th>
    <th>Email</th>
    <th>Admin</th>
    <th></th>
    <th></th>
    <th></th>
    </tr>

    </thead>
    <tbody>
    '.$list.'
    </tbody>
    </table>
    </div>
    </center>
    </div>';
?>
<main>
</body>
</html>