<!DOCTYPE>
<html>
<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<?php
include_once(__DIR__.'/classes/Category.php');
include_once(__DIR__.'/classes/CategoryManager.php');
include_once(__DIR__.'/database/connect-db.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);
$cat = new CategoryManager($db);
$result = $cat->displayCat($_POST['idCat']);
require_once getcwd().('/navAdmin.php');?>

<main>
<div class="row float-left">
<form method="POST" action="updateCategory.php" class="col s12">
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
     <textarea id="textarea1" class="materialize-textarea" name="description"><?php echo $result['description'] ?></textarea>
    <label for="textarea1">Description</label>
</div>
</div>
<div>
<i class="material-icons prefix">account_circle</i><br>
<label for="cat">Parent category</label>
<?php
$parentCat = $cat->displayAllCat();
$listCat = "";
foreach ($parentCat as $val){
    $listCat.=
    '<option value="'.$val['id'].'">'.$cat->getNameParentCat($val['id']).'</option>';
}
echo 
' 
<select class="browser-default col s12" name="parent_id">
    <option value="" disabled selected>'.$cat->getNameParentCat($result['id']).'</option>
    '.$listCat.'
</select>';
?>
</div>
<br><br>
<input type="hidden" name="id" value="<?php echo $result['id'] ?>" />
<input type="submit" class="waves-effect waves-light btn #2e7d32 green darken-3" value="Modifier">
</form>
</div>
<main>
</body>
</html>