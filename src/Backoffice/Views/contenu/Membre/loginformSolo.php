<?php
$cookies = \Component\CookieBakery::bakeMeCookies();
$bool = isset($cookies['rememberMe']);
?>
<div class='cBLogin'>
<form method="post" action="?controller=MembreController&action=lanceLogin">
            <label>Pseudo :</label>
            <input type="text" name="pseudo" value="<?php if($bool) echo $cookies['rememberMe'];?>"/><br/>
            <label>Password :</label>
            <input type="password" name="mdp" /><br/>
            <input type="checkbox" name="remember" <?php if($bool) {
		echo 'checked="checked"';
	}
	else {
		echo '';
	}
	?> value="1">Se souvenir de moi?
            <input type="submit" value="send"/>
</form>
<a href='?controller=MembreController&action=lostPwdForm'>Mot de passe oublié?</a>
</div>