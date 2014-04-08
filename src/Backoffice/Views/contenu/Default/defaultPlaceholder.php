<?php //var_dump($salle); ?>
<div id="latest">
    <h5><a href='?controller=ProduitController&action=displaySalleHasProductMembre'>Voir toutes nos salles &rarr;</a></h5>
    <div id='box1' class='boxArticle'>
        <div class='desc'>
            <h5><?php echo $salle[0]['titre']; ?></h5>
            <p>
                <?php echo $salle[0]['prix'];?> euros<br/>
                <?php echo $salle[0]['capacite'];?> personnes<br/>
                <?php echo $salle[0]['ville'];?><br/>
            </p>
            
        </div>
        <a href='?controller=ProduitController&action=displayProductDetail&id=<?php echo $salle[0]['id_produit']; ?>'>
        <img src='<?php echo $salle[0]['photo']; ?>'/>
        </a>
    </div>
    <div id='box2' class='boxArticle'>
        <div class='desc'>
            <h5><?php echo $salle[1]['titre']; ?></h5>
            <p>
                <?php echo $salle[1]['prix'];?> euros<br/>
                <?php echo $salle[1]['capacite'];?> personnes<br/>
                <?php echo $salle[1]['ville'];?><br/>
            </p>
        </div>
        <a href='?controller=ProduitController&action=displayProductDetail&id=<?php echo $salle[1]['id_produit']; ?>'>
        <img src='<?php echo $salle[1]['photo']; ?>'/>
        </a>
    </div>
    <div id='box3' class='boxArticle'>
        <div class='desc'>
            <h5><?php echo $salle[2]['titre']; ?></h5>
            <p>
                <?php echo $salle[2]['prix'];?> euros<br/>
                <?php echo $salle[2]['capacite'];?> personnes<br/>
                <?php echo $salle[2]['ville'];?><br/>
            </p>
        </div>
        <a href='?controller=ProduitController&action=displayProductDetail&id=<?php echo $salle[2]['id_produit']; ?>'>
        <img src='<?php echo $salle[2]['photo']; ?>'/>
        </a>
    </div>
</div>

