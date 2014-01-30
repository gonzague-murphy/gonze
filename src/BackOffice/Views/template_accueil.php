<!doctype html>
<?php 
header('location : index.php');
?>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->

	
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?php echo $title;?></title>
                <link rel="icon" type="image/png" href="../src/BackOffice/Views/img/logo.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel = "stylesheet" href = "../src/BackOffice/Views/css/GGS.css"/>
		<!--<link rel = "stylesheet" href = "../src/BackOffice/Views/css/style.css"/>-->
		<!-- Here's Golden Gridlet, the grid overlay script. -->
		<script src="../src/BackOffice/Views/js/GGS.js"></script>
		<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>


		
		<!-- 
			This script enables structural HTML5 elements in old IE.
			http://code.google.com/p/html5shim/
		-->
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
<body>
    <div id="main_wrapper">
    <div id = "wrapper_logo_menu">
        <a href="index.php"><h1>LokiSalle</h1></a>
        <h2></h2>
        
<!--<nav>
   <ul class="user_menu">
        <li><a href="?controller=MembreController&action=loginDisplay">connexion</a></li>
        <li><a href="?controller=MembreController&action=signUpDisplay"> inscription</a></li>
   </ul>
</nav>
<nav>
   <ul class="main_menu">
       <li><a href="?controller=SalleController&action=listeAllAdmin">Nos Salles</a></li>
       <li><a href="?controller=ProduitController&action=listeAllSalle">About</a></li>
       <li><a href="#">Support</a></li>
       <li><a href="#">Contact</a></li>
    </ul>
</nav>-->
      </div><!-- fin de la div #wrapper_logo_menu-->
        <?php
        
        echo $content;
        ?>
      <div id="gallery_image">
          <!--<img alt ="gallerie1" title="premiere_offre" src="../src/BackOffice/Views/img/gallerie_baleines.png"/>-->
      </div>
         <!---->
     </div><!--fin div #main_wrapper -->
     <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description', {
                    uiColor: '#de6f40'
                    } );
     </script>
</body>
</html>