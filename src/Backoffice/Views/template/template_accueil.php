<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
<?php require_once("menu.php"); ?>
	
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?php echo "Lokisalle | ".$title;?></title>
                <link rel="icon" type="image/png" href="../src/Backoffice/Views/img/favicon.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel = "stylesheet" href = "../src/Backoffice/Views/css/style.css"/>
		<link rel = "stylesheet" href = "../src/Backoffice/Views/css/jquery.datetimepicker.css"/>
                <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:400,300,400italic,500' rel='stylesheet' type='text/css'>		<!--<script src="../src/Backoffice/Views/js/GGS.js"></script>-->
                <script type="text/javascript" src="../src/Backoffice/Views/js/jquery-1.10.2.js"></script>
                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>                

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
         <!---->
     </div><!--fin div .wrapper -->
     <script src="../src/Backoffice/Views/js/jquery.datetimepicker.js"></script>
     <script src="../src/Backoffice/Views/js/jquery.colorbox-min.js"></script>
     <script src="../src/Backoffice/Views/js/test.js"></script>
     <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
     <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description');
     </script>
</body>
</html>