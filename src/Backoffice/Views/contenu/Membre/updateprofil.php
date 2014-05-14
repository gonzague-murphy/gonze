<?php
if(isset($msg) && is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div>";
    }
}
?>
<form method="post" action="?controller=MembreController&action=updateUser&id=<?php echo $user->id_membre; ?>" class='siteForms'>
        <label>Pseudo :</label>
        <input type="text" name="pseudo" value="<?php echo $user->pseudo; ?>"/>
        <label>Mot de passe :</label>
            <input type="password" name="mdp" value="<?php if(isset($_POST['mdp'])) echo $_POST['mdp']; ?>"/>
            <label>Confirmez le mot de passe :</label>
            <input type="password" name="mdp2" value="<?php if(isset($_POST['mdp2'])) echo $_POST['mdp2']; ?>" />
        <label>Nom :</label>
            <input type="text" name="nom" value="<?php echo $user->nom; ?>"/>
        <label>Prenom :</label>
            <input type="text" name="prenom" value ="<?php echo $user->prenom; ?>"/>
        <label>Email :</label>
            <input type="text" name="email" value="<?php echo $user->email; ?>"/>
            <input type="hidden" name="sex" value="<?php echo $user->sexe; ?>" />
        <label for="ville">Ville :</label>
            <input type="text" name="ville" value="<?php echo $user->ville; ?>"/>
     
        <label for="cp">Code Postal :</label>
            <input type="text" name="cp" value ="<?php echo $user->cp; ?>" />
       
        <label>Adresse :</label>
            <input type="text" name="adresse" value="<?php echo $user->adresse; ?>"/><br/>
        
            <input type="submit" id="submit" name="submit" value="Envoyer" />
    </form>

   