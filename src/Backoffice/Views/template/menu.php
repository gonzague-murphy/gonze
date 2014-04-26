<?php

function makeMenu(){
    
echo "<nav class='main_menu' id='mainMenu'>";
    echo "<ul>";
    if(isset($_SESSION['user']) && $_SESSION['user']['statut'] == 1){
        echo "<li id='adminLi'>";
        makeAdminMenu();
        echo "<a href=#'>ADMIN</a>";
        echo "</li>";
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
        echo "<nav class='user_menu'>";?>
<form id="logMeIn" method="post" action="?controller=MembreController&action=lanceLogin">
            <label>Pseudo :</label>
            <input id="pseudo" type="text" name="pseudo" /><br/>
            <label>Password :</label>
            <input id="mdp" type="password" name="mdp" /><br/>
            <input type="submit" value="send"/>
<a href='?controller=MembreController&action=lostPwdForm'>Mot de passe oublié?</a>
</form>




<?php
        echo "<ul>";
        echo"<noscript><div class='invisible'></noscript>";
        echo "<li id='connexion'>Connexion </li>";
        echo "<noscript></div></noscript>";
        echo "<li><a href='?controller=MembreController&action=signUpForm'>Inscription</a></li>";
        echo "</ul>";
        echo "</nav>";
    }
}

function makeAdminMenu(){
            echo "<ul class='admin_menu'>";
            echo "<li><a href='?controller=SalleController&action=displayForAdmin'>Gérer les Salles</a></li>";
            echo "<li><a href='?controller=ProduitController&action=displaySalleHasProduct'>Gérer les Produits</a></li>";
            echo "<li><a href='?controller=MembreController&action=displayForAdmin'>Gérer les Membres</a></li>";
            echo "<li><a href='?controller=PromotionController&action=displayForAdmin'>Gérer les Codes Promo</a></li>";
            echo "<li><a href='?controller=AvisController&action=listeForAdmin'>Gérer les Avis</a></li>";
            echo "<li><a href='?controller=CommandeController&action=mixDetail'>Gérer les Commandes</a></li>";
            echo "<li><a href='?controller=NewsletterController&action=displayNewsletterAdmin'>Envoyer la newsletter</a></li>";
            echo "<li><a href='?controller=DefaultController&action=assembleStatsAdmin'>Statistiques</a></li>";
            echo "</ul>";
        }

