<form method="post" action="?controller=MembreController&action=lanceSignUp">
        <label>Pseudo :</label>
            <input type="text" name="pseudo" />
        <label>Password :</label>
            <input type="password" name="mdp" />
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
            <input type="text" name="adresse" />
        
            <input type="submit" id="submit" name="submit" value="submit" />
    </form>

   