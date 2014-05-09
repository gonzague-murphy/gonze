<form method="post" action="?controller=MembreController&action=insertAdmin">
    <?php if(isset($msg))echo $msg."<br/>";?>
        <label>Pseudo :</label>
            <input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo'];?>"/>
        <label>Password :</label>
            <input type="password" name="mdp" />
        <label>Confirmez le mot de passe :</label>
            <input type="password" name="mdp2" value="<?php if(isset($_POST['mdp2'])) echo $_POST['mdp2']; ?>" />
        <label>Nom :</label>
            <input type="text" name="nom" />
        <label>Prenom :</label>
            <input type="text" name="prenom" />
        <label>Email :</label>
            <input type="text" name="email" />
        <label for="sex">Sexe :</label>
            <input type="radio" name="sex" value="m" checked />Male
            <input type="radio" name="sex" value="f" />Female
        <label for="ville">Ville :</label>
            <input type="text" name="ville" />
     
        <label for="cp">Code Postal :</label>
            <input type="text" name="cp" />
       
        <label>Adresse :</label>
            <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse'];?>"/>
        <label>Rôle :</label>
        <select name='statut'>
            <option value='2'>Membre</option>
            <option value='1'>Administrateur</option>
        </select>
            <input type="submit" id="submit" name="submit" value="submit" />
    </form>

   