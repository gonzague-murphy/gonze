<?php

function makeFooter(){
    echo "<div id='footer'>";
    echo "<div>";
    echo "<ul class='rappelLiens'>";
    echo "<li><a href=''>Contact</a></li>";
    echo "<li><a href='?controller=DefaultController&action=displayCgv'>CGV</a></li>";
    echo "<li><a href='?controller=DefaultController&action=mentionLegales'>Mentions Légales</a></li>";
    echo "</ul>";
    echo "<ul class='reseauxSociaux'>";
    echo "<li class='twitter'><a href=''>Suivez-nous sur Twitter</a></li>";
    echo "<li class='facebook'><a href=''>Retrouvez-nous sur Facebook</a></li>";
    echo "<li class='googlePlus'><a href=''>Personne n'utilise Google+...</a></li>";
    echo "</ul>";
    if(isset($_SESSION['user'])){
        echo "<ul class='newsLetter'>";
        echo "<p>S'inscrire à la newsletter</p><br/><br/>";
        echo "<form method='post' action='?controller=NewsletterController&action=subscribe'>";
        echo "<label for='news'>Je souhaite recevoir les actualités Lokisalle</label>";
        echo "<input type='checkbox' name='news'/><br/><br/>";
        echo "<input type='submit' value='Envoyer' />";
        echo "</form>";
        echo "</ul>";
    }
    echo "</div>";
    echo "</div>";
}
