<!DOCTYPE html>
 <html lang="fr">
 <head>
 	<meta charset="utf-8">
 	<title>Climate, le site de référence sur le climat</title><!-- Compiled and minified CSS -->
 	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
  	 <link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">     
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
 </head>

 <body>	 	 
	 <header>

			 <nav class="nav-menu lime">
			
				 <?php if($_SESSION['admin'] == 1)
				 {
					 echo '<div class="nav-wrapper">
					 <a href="index.php" class="brand-logo center"><img src="img/logo.png" class="responsive-img"></a>    
					 <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					   <ul class="right hide-on-med-and-down">
					   
							 <li><a href="admin.php"><i class="material-icons">create</i></a></li>
							 <li><a href="#"><i class="material-icons">store</i></a></li>
							 <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
						 
					   </ul>
					   <ul class="side-nav" id="mobile-demo">
						 <li><a href="admin.php"><i class="material-icons">star</i></a></li>
						 <li><a href="index.php"><i class="material-icons">store</i></a></li>
						 <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
					   </ul>
				 </div>';
				 }
				 else{
					 echo '<div class="nav-wrapper">
					 <a href="index.php" class="brand-logo center"><img src="img/logo.png" class="responsive-img"></a>       
					 <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
					   <ul class="right hide-on-med-and-down">
					   
							 <li><a href="index.php"><i class="material-icons">store</i></a></li>
							 <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
						 
					   </ul>
					   <ul class="side-nav" id="mobile-demo">
						 <li><a href="index.php"><i class="material-icons">store</i></a></li>
						 <li><a href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
					   </ul>
				 </div>';
				 }?>
    			
		  	 </nav>
		 </header>