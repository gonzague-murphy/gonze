<?php

if(isset($_GET['msg']) && $_GET['msg'] == 1){
    echo "<h5>Merci, vous recevrez tous les news importantes Lokisalle</h5>";
}

elseif(isset($_GET['msg']) && $_GET['msg'] == 2){
    echo "<h5>Vous etes deja inscrits à notre Newsletter, merci de votre fidélité</h5>";
}

else{
    header("location : ?controller=DefaultController&action=displayIndex");
    exit();
}

