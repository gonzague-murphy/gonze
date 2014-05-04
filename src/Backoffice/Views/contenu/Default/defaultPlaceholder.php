<?php //var_dump($salle); 
if(is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div><br/>";
    }
}
?>
<a href="#" class="unslider-arrow prev"><img src="../src/Backoffice/Views/img/icons/rew.png" />&nbsp;&nbsp;&nbsp;</a>
<a href="#" class="unslider-arrow next"><img src="../src/Backoffice/Views/img/icons/fwd.png" /></a>
<div class="carousel">
    <ul>
        <li><img src="../src/Backoffice/Views/img/carousel/slide1.jpg" /></li>
        <li><img src="../src/Backoffice/Views/img/carousel/slide2.jpg" /></li>
        <li><img src="../src/Backoffice/Views/img/carousel/slide3.jpg" /></li>
        <li><img src="../src/Backoffice/Views/img/carousel/slide4.jpg" /></li>
    </ul>
</div>
        <div id='galerie'>
            <div class="titleHome">
            <h3 class="categorie">&nbsp;&nbsp;&nbsp;Nos 3 dernières offres</h3>
            </div>
            <ul class="produit">
            <?php
            foreach($salle as$key=>$value){
            echo "<li>";
            echo "<h5>".$value['titre']."</h5>";
            echo "<p>";
            echo $value['prix']."euros<br/>";
            echo $value['capacite']."personnes<br/>";
            echo $value['ville']."<br/>";
            echo "</p>";
            echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$salle[0]['id_produit']."'>";
            echo "<img src='".$value['photo']."'/>";
            echo "</a>";
            echo "</li>";
            }
?>
            </ul>
        </div>

<div id="partenaires">
    <div class="titleHome">
    <h3 class="categorie">Ils nous ont fait confiance</h3>
    </div>
</div>

