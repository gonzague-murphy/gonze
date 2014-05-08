<?php
if(isset($msg) && is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div>";
    }
}
?>
<link rel = "stylesheet" href = "../src/Backoffice/Views/css/style.css"/>
<div class='cBLogin'>
<form method="post" action="?controller=MembreController&action=lanceSignUp" class='sign'>
        <label>Pseudo :</label>
            <input type="text" name="pseudo" value="<?php if(isset($_POST['pseudo'])) echo $_POST['pseudo']; ?>"/>
        <label>Mot de passe :</label>
            <input type="password" name="mdp" value="<?php if(isset($_POST['mdp'])) echo $_POST['mdp']; ?>" />
       <label>Confirmez le mot de passe :</label>
            <input type="password" name="mdp2" value="<?php if(isset($_POST['mdp2'])) echo $_POST['mdp2']; ?>" />
        <label>Nom :</label>
            <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>"/>
        <label>Prenom :</label>
            <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>"/>
        <label>Email :</label>
            <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/>
        <label for="sex">Sexe :</label>
            <input type="radio" name="sex" value="m" checked />Male
            <input type="radio" name="sex" value="f" />Female
        <label for="ville">Ville :</label>
            <input type="text" name="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>"/>
     
        <label for="cp">Code Postal :</label>
            <input type="text" name="cp" value="<?php if(isset($_POST['cp'])) echo $_POST['cp']; ?>"/>
       
        <label>Adresse :</label>
            <input type="text" name="adresse" value="<?php if(isset($_POST['adresse'])) echo $_POST['adresse']; ?>"/>
        
            <input type="submit" id="submit" name="submit" value="S'inscrire" />
    </form>
</div>
   