<?php //var_dump($salle); 
if(is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div><br/>";
    }
}
?>
        <div id='homePage'>
            <ul>
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

