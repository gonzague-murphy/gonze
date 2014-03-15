<?php 
//var_dump($user);
?>
<form method="post" action="?controller=MembreController&action=updateUser&id=<?php echo $user->id_membre; ?>">
        <label>Pseudo :</label>
        <input type="text" name="pseudo" value="<?php echo $user->pseudo; ?>"/>
        <label>Password :</label>
            <input type="password" name="mdp" value="<?php echo $user->password; ?>"/>
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
            <input type="text" name="adresse" value="<?php echo $user->adresse; ?>"/>
        
            <input type="submit" id="submit" name="submit" value="submit" />
    </form>

   