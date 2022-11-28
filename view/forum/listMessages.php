<?php

$messages = $result["data"]['messages'];
    
?>

<h1>liste messages</h1>

<?php
foreach($messages as $message){

    ?>
    <p><?=$message->getSujet()?></p>
    <p><?=$message->getVisiteur()?></p>
    <p><?=$message->getTexte()?></p>
    <p><?=$message->getDateCreation()?></p>
    <?php
}