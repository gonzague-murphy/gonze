<div>
<form class='siteForms'>
<?php
$user = Component\UserSessionHandler::getUser();
if(empty($user)){
    echo "<label for='expedit'>Expediteur :</label>";
    echo "<input type='text' name='expedit'/>";
}
?>
     <label>Sujet :</label>
    <input type='text' />
    <label for='corpsMessage'>Votre message:</label>
    <textarea class="ckeditor"></textarea>
</form>
</div>
