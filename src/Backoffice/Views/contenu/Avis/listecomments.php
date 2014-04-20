<h3>Avis :</h3>
<?php 
var_dump($avis);
foreach($avis as $key=>$value){
    echo "<h4>".$value['pseudo']."</h4>";
    echo "<p>".$value['commentaire']."</p>";
    echo "<p>Note attribuée :".$value['note']."</p>";
}
$user = \Component\UserSessionHandler::getUser();
var_dump($user);
if(!empty($user)){
    /*$avis = new Backoffice\Controller\AvisController;
    $doubleFeedback = $avis->checkFeedbackLeft($user->id_membre, $liste['id_salle']);*/
}
else{
    echo "Vous devez etre <a href=''>connecté</a> pour laisser un avis<br/>";
}