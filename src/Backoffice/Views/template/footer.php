<?php

function makeFooter(){
    echo "<div id='footer'>";
    echo "<div>";
    echo "<ul class='rappelLiens'>";
    echo "<li><a href=''>Contact</a></li>";
    echo "<li><a href=''>CGV</a></li>";
    echo "<li><a href=''>Mentions Légales</a></li>";
    echo "</ul>";
    echo "<ul class='réseauxSociaux'>";
    echo "<li><a href=''>Suivez-nous sur Twitter</a></li>";
    echo "<li><a href=''>Retrouvez-nous sur Facebook</a></li>";
    echo "<li><a href=''>Nous sommes aussi sur Google+...</a></li>";
    echo "</ul>";
    if(isset($_SESSION['user'])){
        echo "<ul class='newsLetter'>";
        echo "<p>S'inscrire à la newsletter</p>";
        echo "<form method='post' action='?controller=NewsletterController&action=subscribe'>";
        echo "<label for='news'>Oui, je souhaite m'inscrire et recevoir les actualités Lokisalle</label>";
        echo "<input type='checkbox' name='news'/>";
        echo "<input type='submit' value='S'inscrire />";
        echo "</form>";
        echo "</ul>";
    }
    echo "</div>";
    echo "</div>";
}
