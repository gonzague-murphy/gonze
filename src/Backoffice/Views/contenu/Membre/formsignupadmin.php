<?php
if(isset($msg) && is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div>";
    }
}
?>
<form method="post" action="?controller=MembreController&action=insertAdmin" class='siteForms'>
        <label>Pseudo :</label>
            <input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'];?>"/>
        <label>Password :</label>
            <input type="password" name="mdp" value="<?php if(isset($_POST['mdp'])) echo $_POST['mdp'];?>"/>
        <label>Confirmez le mot de passe :</label>
            <input type="password" name="mdp2" value="<?php if(isset($_POST['mdp2'])) echo $_POST['mdp2']; ?>" />
        <label>Nom :</label>
            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom'];?>" />
        <label>Prenom :</label>
            <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom'];?>"/>
        <label>Email :</label>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>"/>
        <label for="sex">Sexe :</label>
        <select name='sex'>
            <option value='m'>Homme</option>
            <option value='f'>Femme</option>
        </select>
        <label for="ville">Ville :</label>
            <input type="text" name="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville'];?>"/>
     
        <label for="cp">Code Postal :</label>
            <input type="text" name="cp" value="<?php if(isset($_POST['cp'])) echo $_POST['cp'];?>"/>
       
        <label>Adresse :</label>
            <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse'];?>"/>
        <label>Rôle :</label>
        <select name='statut'>
            <option value='2'>Membre</option>
            <option value='1'>Administrateur</option>
        </select>
            <input type="submit" id="submit" name="submit" value="Ajouter" />
    </form>

   