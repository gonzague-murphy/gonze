<form method='post' action='?controller=NewsletterController&action=sendNewsletterAdmin'>
    <?php if(isset($msg))echo $msg."<br/>"; ?>
    <label>Sujet</label>
    <input type='text' name='sujet' value='<?php if(isset($_POST['sujet'])) echo $_POST['sujet'];?>' />
    <label>Message</label>
    <textarea name='message'></textarea>
    <input type='submit' value='Envoyer la Newsletter' />
</form>

