<?php
session_start();
include_once getcwd().('/header.php'); 
require_once(__DIR__.'/classes/cookie.php');
require_once(__DIR__.'/database/connect-db.php');
require_once(__DIR__.'/classes/Product.php');
require_once(__DIR__.'/classes/ProductManager.php');
require_once(__DIR__.'/classes/SearchBar.php');

$db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

$search = new Product($_POST);
$query = new SearchBar($db, $search);

?>
<div class="parallax-container para">
        <div class="parallax"><img src="img/ban.jpg"></div>
    </div>
    <div class="section white">
        <div class="row container">
            <h2 class="header">Résultats pour<?php echo " ".$search->getData('search')?></h2>
                <p class="grey-text text-darken-3 lighten-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate pulvinar faucibus. 
                Suspendisse lorem arcu, molestie ut rutrum nec, malesuada et est. Sed quam dui, blandit eu elementum a, suscipit ac massa. 
                Suspendisse in lacinia nulla. Aliquam justo tellus, efficitur eu gravida in, gravida vitae nisi.
                </p>
                <section>	
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <?php $product = new SearchBar($db, $search);
                            $product->displaySearch();
                            ?>
                            </div>
                        </div>
                </div>
             </section>
        </div>
    </div>

   <?php
   include_once getcwd().('/footer.php'); 

?>
