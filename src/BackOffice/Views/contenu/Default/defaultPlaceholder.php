<div id='latest'>
<?php var_dump($salle); ?>
    <div id='first'>
        <div id='descriptionFirst'>
            <h3><?php echo $salle[0]['titre']; ?></h3>
        </div>
        <img src='<?php echo $salle[0]['photo']; ?>'/>
        </div>
    <div id='second'>
        <div id='descriptionFirst'>
            <h3><?php echo $salle[1]['titre']; ?></h3>
        </div>
        <img src='<?php echo $salle[1]['photo']; ?>'/>
    </div>
    <div id='third'>
        <div id='descriptionFirst'>
            <h3><?php echo $salle[2]['titre']; ?></h3>
        </div>
        <img src='<?php echo $salle[2]['photo']; ?>'/>
    </div>
</div>

