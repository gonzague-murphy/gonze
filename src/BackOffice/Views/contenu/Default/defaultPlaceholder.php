<?php //var_dump($salle); ?>
<div id="latest">
    <div class='first'>
        <div class='desc'>
            <h5><?php echo $salle[0]['titre']; ?></h5>
            <p>
                <?php echo $salle[0]['prix'];?> euros<br/>
                <?php echo $salle[0]['capacite'];?> personnes<br/>
                <?php echo $salle[0]['ville'];?><br/>
            </p>
        </div>
        <img src='<?php echo $salle[0]['photo']; ?>'/>
    </div>
    <div class='second'>
        <div class='desc'>
            <h5><?php echo $salle[1]['titre']; ?></h5>
            <p>
                <?php echo $salle[1]['prix'];?> euros<br/>
                <?php echo $salle[1]['capacite'];?> personnes<br/>
                <?php echo $salle[1]['ville'];?><br/>
            </p>
        </div>
        <img src='<?php echo $salle[1]['photo']; ?>'/>
    </div>
    <div class='third'>
        <div class='desc'>
            <h5><?php echo $salle[2]['titre']; ?></h5>
            <p>
                <?php echo $salle[2]['prix'];?> euros<br/>
                <?php echo $salle[2]['capacite'];?> personnes<br/>
                <?php echo $salle[2]['ville'];?><br/>
            </p>
        </div>
        <img src='<?php echo $salle[2]['photo']; ?>'/>
    </div>
</div>

