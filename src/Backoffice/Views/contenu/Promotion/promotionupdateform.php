<?php 
echo '<form method="post" action="?controller=PromotionController&action=updateCodePromo&id='.$var->getIdPromo().'">
';
echo '<label>Code Promo :</label>';
echo '<input type="text" name="code_promo" value="'.$var->getCodePromo().'"/>';
echo '<label>Reduction :</label>';
echo '<input type="text" name="reduction" value="'.$var->getReduction().'"/>';
echo '<input type="submit" value="Envoyer"/>';
