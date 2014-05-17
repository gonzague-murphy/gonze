<?php 
require_once("menu.php"); 
require_once("footer.php"); 
?>
<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->

	
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?php echo "Lokisalle | ".$title;?></title>
                <link rel="icon" type="image/png" href="../src/Backoffice/Views/img/key.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel = "stylesheet" href = "../src/Backoffice/Views/css/style.css"/>
		<link rel = "stylesheet" href = "../src/Backoffice/Views/css/jquery.datetimepicker.css"/>
                <link href='http://fonts.googleapis.com/css?family=Oswald&subset=latin' rel='stylesheet' type='text/css'>
                <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>                
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
    <div id='bigWrapper'>
    <div id='en_tete'>
    <div id="menu">
    <?php makeMenu(); ?>
    </div><!--fin de la div #menu -->
    <div id = "twoway">
        <div id='loupe'>&nbsp;&nbsp;&nbsp;Recherche</div>
        <img src='../src/Backoffice/Views/img/logo.png' alt='logoLoki' />
        <a href="?controller=DefaultController&action=indexDisplay"><h1>LokiSalle</h1></a>
        <p>Location de salles partout en France en 2 clics !</p>
        <?php makeUserMenu();?>
    </div><!-- fin de la div #twoway-->
    </div><!-- fin de la div #en_tete-->
    <div class="tripleSearch">
        <span>*Merci de remplir tous les champs pour plus de précision dans la recherche</span><br/><br/>
        <form method='post' action='?controller=ProduitController&action=customSearch'>
            <label for="mois">Mois : </label>
            <select name="mois">
<?php
$months = array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Décembre");
foreach($months as $key=>$value){
    echo "<option value='".($key + 1)."'>".$value."</option>";
}
?>
            </select>
            <label for="annee">Annee : </label>
            <select name="annee">
                <option>2014</option>
                <option>2015</option>
            </select>
            <label for="motCle">Par mot-clé : </label>
            <input type="text" name="motCle" placeholder="Ex: Paris" />
            <input type="submit" value="Chercher" class='order'/>
        </form>
    </div>
    <div class="wrapper">
      <div id="content">
        <?php 
        echo $content;
        ?>
      </div>
         <!---->
     </div><!--fin div .wrapper -->
     <script src="../src/Backoffice/Views/js/test.js"></script>
     <script src="../src/Backoffice/Views/js/jquery.datetimepicker.js"></script>
     <script src="../src/Backoffice/Views/js/jquery.colorbox-min.js"></script>
     <script src="../src/Backoffice/Views/js/unslider.js"></script>
     <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
     <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'description');
     </script>
     <?php makeFooter(); ?>
     </div>
</body>
</html>