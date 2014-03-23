<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
<?php require_once('menu.php'); ?>
	
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?php echo "Lokisalle | ".$title;?></title>
                <link rel="icon" type="image/png" href="../src/BackOffice/Views/img/favicon.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<!--<link rel = "stylesheet" href = "../src/BackOffice/Views/css/GGS.css"/>-->
		<!--<link rel = "stylesheet" href = "../src/BackOffice/Views/css/style.css"/>-->
                <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
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
<body onload="x();">
    <div id='en_tete'>
    <div id="menu">
    <?php makeMenu(); ?>
    <?php makeAdminMenu(); ?>
    </div><!--fin de la div #menu -->
    <div id = "twoway">
        <div id='loupe'>
        <input type='text' name='ville' placeholder='Chercher par ville...'/>
        </div>
        <a href="index.php"><h1>LokiSalle</h1></a>
        <?php makeUserMenu();?>
    </div><!-- fin de la div #twoway-->
    </div><!-- fin de la div #en_tete-->
    <div class="wrapper">
      <div id="content">
        <?php 
        echo $content;
        ?>
      </div>
      <div id="gallery_image">
          <!--<img alt ="gallerie1" title="premiere_offre" src="../src/BackOffice/Views/img/gallerie_baleines.png"/>-->
      </div>
         <!---->
     </div><!--fin div .wrapper -->
     <script src="../src/BackOffice/Views/js/test.js"></script>
     <script src="../src/BackOffice/Views/js/jquery.js"></script>
     <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description');
     </script>
</body>
</html>