<form method='post' action='?controller=MembreController&action=mailPwd'>
    <label>Entrez ici l'adresse e-mail fournie lors de votre inscription :</label>
    <?php if(isset($msg))echo $msg; ?>
    <input type='text' name='email' />
    <input type='submit' value='Envoyer' />
</form>