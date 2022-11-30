<?php

$sujets = $result["data"]['sujets'];
    
?>
<div class="listeSujets">

        <form action='index.php?ctrl=forum&action=ajoutSujet&id=<?=$id?>' method='post' class="nouveauSujet">nouveau sujet
            <input type="text" name="titre" placeholder="Saisir un titre">
            <input type="text" name="message" placeholder="Saisir un message">
            <input type="submit" name="ajouterSujet" value="Ajouter"><i class="fa-solid fa-plus"></i>
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





  
