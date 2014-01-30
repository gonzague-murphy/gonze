<?php
if(isset($_SESSION['user'])){
    echo "<nav>";
    echo "<ul class='user_menu'>";
    echo "<li><a href=#>Mon profil</a></li>";
    echo "<li><a href=#> Mon panier</a></li>";
    echo "<li><a href=#> Deconnexion</a></li>";
    echo "</ul>";
    echo "</nav>";
}

elseif(!isset($_SESSION['user'])){
    echo "<nav>";
    echo "<ul class='user_menu'>";
    echo "<li><a href='?controller=MembreController&action=loginDisplay'>connexion</a></li>";
    echo "<li><a href='?controller=MembreController&action=signUpDisplay'> inscription</a></li>";
    echo "</ul>";
    echo "</nav>";
}


?>

  
   
</nav>
<nav>
   <ul class="main_menu">
       <li><a href="?controller=SalleController&action=listeAllAdmin">Nos Salles</a></li>
       <li><a href="?controller=ProduitController&action=listeAllSalle">About</a></li>
       <li><a href="#">Support</a></li>
       <li><a href="#">Contact</a></li>
    </ul>
</nav>