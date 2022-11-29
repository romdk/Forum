<?php

$sujets = $result["data"]['sujets'];
    
?>
<div class="listeSujets">

        <p class="nouveauSujet">Créer un nouveau sujet<input type="text" placeholder="Saisir un titre"><i class="fa-solid fa-plus"></i></p>
    <?php
    foreach($sujets as $sujet){

        ?>
            <a href="index.php?ctrl=forum&action=listMessages">
                <div class="sujet">
                    <p class="titre"><?=$sujet->getTitre()?></p>
                    <p class="par">par</p>
                    <p class="pseudo"><?=$sujet->getVisiteur()->getPseudonyme()?></p>
                    <p class="message2">dernier message</p>
                </div>
            </a>
        <?php
    }
    ?>
</div>





  
