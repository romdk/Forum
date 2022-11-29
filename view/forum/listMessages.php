<?php

$messages = $result["data"]['messages'];
    
?>

<div>
    <p>Titre du sujet</p>
    <p>auteur du sujet</p>
    <p>date de creation du sujet</p>
</div>

<?php
foreach($messages as $message){

    ?>
    <div class="message2">
        <p><?=$message->getVisiteur()->getPseudonyme()?></p>
        <p><?=$message->getVisiteur()->getRole()?></p>
        <p><?=$message->getDateCreation()?></p>
        <p><?=$message->getTexte()?></p>
        <button><i class="fa-regular fa-comment"></i><input class="hidden" type="text"></button>
    </div>
    <?php
}