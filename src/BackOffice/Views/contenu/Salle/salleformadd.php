<?php
echo "<form method='post' action='?controller=SalleController&action=addSalle' enctype='multipart/form-data'>";
?>
        <label>Pays</label>
            <input type="text" name="pays"/>
        <label>Ville</label>
            <input type="text" name="ville"/>
        <label>Adresse</label>
            <input type="text" name="adresse"/>
        <label>Code Postal</label>
            <input type="text" name="cp"/>
        <label>Titre</label>
            <input type="text" name="titre"/>
        <label>Description</label>
        <textarea name="description" id="description"></textarea>
        <label>photo</label>
            <input type="file" name="photo" />
     
        <label>Capacité</label>
            <input type="text" name="capacite"/>
            <input type="submit" id="submit" name="submit" value="submit" />
            
    </form>


