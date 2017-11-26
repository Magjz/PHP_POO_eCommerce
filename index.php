<?php 

session_start();

if ($_SESSION == NULL)
{
    header("Location: login.php");
}
else{
    require_once getcwd(). ('/classes/ProductManager.php');
    require_once getcwd(). ('/database/connect-db.php');
    require_once getcwd(). ('/classes/Product.php');
    require_once getcwd(). ('/classes/SearchBar.php');

    $db = connect_db(HOST, USERNAME, PASSWORD, PORT, DB);

    include_once getcwd().('/header.php'); ?>

    <div class="parallax-container para">
        <div class="parallax"><img src="img/ban.jpg"></div>
    </div>
    <div class="section white">
        <div class="row container">
            <h2 class="header">Choisissez parmis la plus belle sélection de climats</h2>
                <p class="grey-text text-darken-3 lighten-3">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam vulputate pulvinar faucibus. 
                Suspendisse lorem arcu, molestie ut rutrum nec, malesuada et est. Sed quam dui, blandit eu elementum a, suscipit ac massa. 
                Suspendisse in lacinia nulla. Aliquam justo tellus, efficitur eu gravida in, gravida vitae nisi.
                </p>
                <?php
                $search = new Product($_POST);
                $query = new SearchBar($db, $search);

                ?>
                <section>
                    <div class="row margin-bot-30">
                        <div class= "col l6 m6 offset-m3, s12">
                            <form method="POST" action=<?php echo htmlspecialchars('search.php');?>>
                            <?php
                                echo $search->input_search('search');
                                echo $search->submit();?>
                            </form>
                        </div>
                    </div>
                </section>

               

                <section>	
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="row">
                            <?php $product = new ProductManager($db);
                            $displayProduct = $product->displayAllProduct();
                          
                            foreach($displayProduct as $value)
                            {   echo 
                                '<div class="col s12 m12 l4">
                                    <div class="card">
                                        <div class="card-image">
                                            <img src="' . $value['picture'].'" class="responsive-img">
                                        </div>
                                        <div class="card-content">
                                            <h2>'. $value["name"]. '</h2>
                                            <p>' . $value['description']. '</p>
                                            <p class ="prix">' . $value['price'].' €</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="#">Commander</a>
                                        </div>
                                    </div>
                                </div>';
                            } ?>
                            </div>
                        </div>
                </div>
             </section>
        </div>
    </div>

   <?php
   include_once getcwd().('/footer.php');
}
?>

  
   




