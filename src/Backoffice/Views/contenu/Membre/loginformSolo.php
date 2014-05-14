<?php
$cookies = \Component\CookieBakery::bakeMeCookies();
$bool = isset($cookies['rememberMe']);
?>
<link rel = "stylesheet" href = "../src/Backoffice/Views/css/style.css"/>
<div class='cBLogin'>
<?php
    if(isset($msg)){
    echo "<div class='error' style='color:red;'>".$msg."</div>";
}
?>
<form method="post" action="?controller=MembreController&action=lanceLogin">
            <label>Pseudo :</label>
            <input type="text" name="pseudo" id="pseudo" value="<?php if($bool) echo $cookies['rememberMe'];?>"/><br/>
            <label>Password :</label>
            <input type="password" name="mdp" id="mdp" /><br/>
            <label for="remember">Se souvenir de moi?</label>
            <input type="checkbox" name="remember" <?php if($bool) {
		echo 'checked="checked"';
	}
	else {
		echo '';
	}
	?> value="1"><br/><br/>
            <a href='?controller=MembreController&action=lostPwdForm' target="_top">Mot de passe oublié?</a>
            <input type="submit" value="Connexion"/>
</form>
</div>