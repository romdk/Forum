<?php

$sujets = $result["data"]['sujets'];
    
?>
<div class="listeSujets">

        <form class="nouveauSujet" action='index.php?ctrl=forum&action=ajoutSujet&id=<?=$id?>' method='post'>nouveau sujet
            <input id="champTitre" type="text" name="titre" placeholder="Saisir un titre">
            <i id="boutonPlus" class="fa-solid fa-plus"></i>
            <textarea id="champMessage" type="text" name="1erMessage" placeholder="Saisir un message"></textarea>
            <input id="btnAjouter" type="submit" name="ajouterSujet" value="Créer sujet">
        </form>
    <?php
    foreach($sujets as $sujet){

        ?>
            <a href="index.php?ctrl=forum&action=listMessages&id=<?= $sujet->getId()?>">
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





  
