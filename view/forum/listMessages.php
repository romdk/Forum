<?php

$messages = $result["data"]['messages'];
    
?>

<div class="infoSujet">
    <p>Titre du sujet</p>
    <p>auteur du sujet</p>
    <p>date de creation du sujet</p>
</div>

<div class="listeMessages">
    <?php
    foreach($messages as $message){
        ?>            
            <div class="message2">
                <p class="pseudo"><?=$message->getVisiteur()->getPseudonyme()?></p>
                <p class="role"><?=$message->getVisiteur()->getRole()?></p>
                <p class="date"><?=$message->getDateCreation()?></p>
                <p class="texte"><?=$message->getTexte()?></p>
                <div class="interactions">
                    <div class="repondre">
                        <button><i class="fa-regular fa-comment"></i> Répondre<input class="hidden" type="text"></button>
                    </div>
                    <div class="vote">
                        <button><i class="fa-solid fa-up-long"></i></button>
                        <p><?=$message->getNbVote()?></p>
                        <button><i class="fa-solid fa-down-long"></i></button>
                    </div>
                </div>
            </div>            
        <?php
    }
?>


