<?php
echo "<div class='userMessage'>";
if(isset($_GET['msg']) && $_GET['msg'] == 1){
    echo "<h5>Merci, vous recevrez toutes les actualités Lokisalle dans votre boite mail.</h5>";
}

elseif(isset($_GET['msg']) && $_GET['msg'] == 2){
    echo "<h5>Vous êtes déjà inscrits à notre Newsletter, merci de votre fidélité.</h5>";
}

else{
    header("location : ?controller=DefaultController&action=displayIndex");
    exit();
}

echo "</div>";