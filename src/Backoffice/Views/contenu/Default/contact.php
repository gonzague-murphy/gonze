<div>
<form method='post' action='?controller=DefaultController&action=makeContactMail' class='siteForms'>
<?php
if(isset($msg) && is_array($msg)){
    foreach($msg as $key=>$value){
        echo "<div class='error'>".$value."</div>";
    }
}

$user = Component\UserSessionHandler::getUser();
if(empty($user)){
    echo "<label for='expedit'>Expediteur :</label>";
    echo "<input type='text' name='expediteur'/>";
}
?>
    <label for='sujet'>Sujet :</label>
        <input type='text' name='sujet'/>
    <label for='message'>Votre message:</label>
        <textarea class="ckeditor" name='message'></textarea>
    <input type="submit" name='envoyer' value="Envoyer" />
</form>
</div>
