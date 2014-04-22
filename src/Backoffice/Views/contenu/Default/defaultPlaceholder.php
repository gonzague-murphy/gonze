<?php //var_dump($salle); ?>
<div id="latest">
    <h5><a href='?controller=ProduitController&action=displaySalleHasProductMembre'>Voir toutes nos salles &rarr;</a></h5>
    <div class='boxArticle'>
        <div class='desc'>
            <?php
            foreach($salle as$key=>$value){
            echo "<h5>".$value['titre']."</h5>";
            echo "<p>";
            echo $value['prix']."euros<br/>";
            echo $value['capacite']."personnes<br/>";
            echo $value['ville']."<br/>";
            echo "</p>";
            echo "<a href='?controller=ProduitController&action=displayProductDetail&id=".$salle[0]['id_produit']."'>";
            echo "<img src='".$value['photo']."'/>";
            echo "</a>";
            }
?>
        </div>
    </div>
</div>

