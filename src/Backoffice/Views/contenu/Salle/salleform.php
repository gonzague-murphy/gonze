<?php
if(isset($msg) && is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div>";
    }
}

echo "<form method='post' enctype='multipart/form-data' action='?controller=SalleController&action=modifySalle&id=".$_GET['id']."' class='siteForms'>
"
?>
        <label>Pays</label>
            <input type="text" name="pays" value="<?php echo $salles->getPays();?>"/>
        <label>Ville</label>
            <input type="text" name="ville" value="<?php echo $salles->getVille();?>"/>
        <label>Adresse</label>
            <input type="text" name="adresse" value="<?php echo $salles->getAdresse();?>"/>
        <label>Code Postal</label>
            <input type="text" name="cp" value="<?php echo $salles->getCp();?>"/>
        <label>Titre</label>
            <input type="text" name="titre" value="<?php echo $salles->getTitre();?>"/>
        <label>Description</label>
        <textarea class="ckeditor" name="description" id="description"><?php echo $salles->getDescription();?></textarea>
        <label>photo</label>
            <?php echo "<img src='".$salles->getPhoto()."'/>" ?>
            <input type="file" name="photo" />
            <input type="hidden" name="photoActuelle" value="<?php echo $salles->getPhoto(); ?>" />
     
        <label>Capacité</label>
            <input type="text" name="capacite" value="<?php echo $salles->getCapacite();?>"/>
            <input type="submit" id="submit" name="submit" value="Modifier" />
            
    </form>
