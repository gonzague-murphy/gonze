<form method='post' action='?controller=MembreController&action=mailPwd' class="siteForms">
    <label>Entrez ici l'adresse e-mail fournie lors de votre inscription :</label>
    <?php if(isset($msg))echo "<div class='error'>".$msg."</div>"; ?>
    <input type='text' name='email' />
    <input type='submit' value='Envoyer' />
</form>