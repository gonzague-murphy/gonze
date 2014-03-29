<?php

function makeMenu(){
    
echo "<nav class='main_menu' id='mainMenu'>";
    echo "<ul>";
    if(isset($_SESSION['user']) && $_SESSION['user']['statut'] == 1){
        echo "<li><a href=#'>ADMIN</a></li>";
    }
    echo "<li><a href='?controller=ProduitController&action=displaySalleHasProductMembre'>NOS SALLES</a></li>";
    echo "<li><a href=''>ABOUT</a></li>";
    echo "<li><a href='#'>SUPPORT</a></li>";
    echo "<li><a href='#'>CONTACT</a></li>";
    echo "</ul>";
    echo "</nav>";
}

function makeUserMenu(){
    if(isset($_SESSION['user'])){
        echo "<nav class='user_menu'>";
        echo "<ul>";
        echo "<li id='cart'><a href='?controller=CommandeController&action=panierDisplay'> Mon panier(".count(Component\PanierSessionHandler::getPanier()).")</a></li>";
        echo "<li id='monCompte'><a href='?controller=MembreController&action=displayFicheDetail'>Mon compte</a></li>";
        echo "<li id='deconnexion'><a href='?controller=MembreController&action=deconnexion'> Deconnexion</a></li>";
        echo "</ul>";
        echo "</nav>";
}
    else{
        echo "<nav class='user_menu'>";
        echo "<ul>";
        echo "<li><a href='?controller=MembreController&action=loginDisplay'>Connexion </a></li>";
        echo "<li><a href='?controller=MembreController&action=signUpForm'>Inscription</a></li>";
        echo "</ul>";
        echo "</nav>";
    }
}

/*function makeAdminMenu(){
    if(isset($_SESSION['user']) && $_SESSION['user']['statut'] == 1){
            /*echo "<div id='buttonMenu' onclick='breathLeft();'>";
            echo "<img src='../img/arrow-right.png' />";
            echo "</div>";*/
            echo "<nav class='admin_menu' id='admin_menu'>";
            echo "<ul>";
            echo "<li><a href='?controller=SalleController&action=displayForAdmin'>Gérer les Salles</a></li>";
            echo "<li><a href='?controller=ProduitController&action=displaySalleHasProduct'>Gérer les Produits</a></li>";
            echo "<li><a href='?controller=MembreController&action=displayForAdmin'>Gérer les Membres</a></li>";
            echo "<li><a href='?controller=PromotionController&action=displayForAdmin'>Gérer les Codes Promo</a></li>";
            echo "<li><a href=''>Gérer les Avis</a></li>";
            echo "<li><a href=''>Gérer les Commandes</a></li>";
            echo "<li><a href=''>Envoyer la newsletter</a></li>";
            echo "<li><a href=''>Statistiques</a></li>";
            echo "</ul>";
            echo "</nav>";
        /*}
}*/
