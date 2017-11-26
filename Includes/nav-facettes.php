<?php
require ('../classes/cookie.php');
require ('../database/connect-db.php');
require ('../classes/Product.php');
require ('../classes/ProductManager');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);


$facette = new Product($_POST);
?>
<form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
<?php
    echo $facette->input_search('search');
    echo $facette->input_
    echo $facette->submit();
?>
</form>