<?php 
echo '<form method="post" action="?controller=PromotionController&action=addCodePromo">
';
echo '<label>Code Promo :</label>';
echo '<input type="text" name="code_promo"/>';
echo '<label>Reduction :</label>';
echo '<input type="text" name="reduction"/>';
echo '<input type="submit" value="Envoyer"/>';
