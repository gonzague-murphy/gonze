<!doctype html>
<!--[if lt IE 9]><html class="ie"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->

	
	<head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?php echo $title;?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel = "stylesheet" href = "../src/BackOffice/Views/css/GGS.css"/>
		<link rel = "stylesheet" href = "../src/BackOffice/Views/css/style.css"/>
		<!-- Here's Golden Gridlet, the grid overlay script. -->
		<script src="../src/BackOffice/Views/js/GGS.js"></script>
		


		
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
    <div id = "wrapper_logo_menu" class="clearfix">
    <h1>LokiSalle</h1>
        <h2></h2>
        <nav>
            <ul class="main_menu">
                <li><a href="#">about</a></li>
                <li><a href="#">nos salles</a></li>
                <li><a href="#">connexion |</a></li>
                <li><a href="#"> inscription</a></li>
            </ul>
        </nav>
      </div><!-- fin de la div #wrapper_logo_menu-->
        <?php
        
        echo $content;
        ?>
      <div id="gallery_image">
          <!--<img alt ="gallerie1" title="premiere_offre" src="../src/BackOffice/Views/img/gallerie_baleines.png"/>-->
      </div>
         <!--<form method="post" action="">
            <label>Pseudo :</label>
            <input type="text" name="pseudo" /><br/>
            <label>Password :</label>
            <input type="password" name="mdp" /><br/>
            <input type="submit" value="send"/>
        </form>-->
     </div><!--fin div #main_wrapper -->
</body>
</html>