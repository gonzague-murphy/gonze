<?php
if(isset($_SESSION['user'])){
    echo "<nav>";
    echo "<ul class='user_menu'>";
    echo "<li><a href=#>Mon profil</a></li>";
    echo "<li><a href=#> Mon panier</a></li>";
    echo "<li><a href=#> Deconnexion</a></li>";
    echo "</ul>";
    echo "</nav>";
    if($_SESSION['user']['statut'] == 1){
        echo "<nav>";
        echo "<ul class='admin_menu'>";
        echo "<li><a href='?controller=SalleController&action=listeAllAdmin'>Gérer les Salles</a></li>";
        echo "<li><a href='?controller=ProduitController&action=listeProduitAdmin'>Gérer les Produits</a></li>";
        echo "<li><a href=''>Gérer les Membres</a></li>";
        echo "<li><a href=''>Gérer les Codes Promo</a></li>";
        echo "<li><a href=''>Gérer les Avis</a></li>";
        echo "<li><a href=''>Gérer les Commandes</a></li>";
        echo "<li><a href=''>Envoyer la newsletter</a></li>";
        echo "<li><a href=''>Statistiques</a></li>";
        echo "</ul>";
    }
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
       <li><a href="">Nos Salles</a></li>
       <li><a href="">About</a></li>
       <li><a href="#">Support</a></li>
       <li><a href="#">Contact</a></li>
    </ul>
</nav>