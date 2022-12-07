<?php

$sujets = $result["data"]['sujets'];
    
?>
<div class="listeSujets">

<?php
if(App\Session::getVisiteur()){ ?>
    <form class="nouveauSujet" action='index.php?ctrl=forum&action=ajoutSujet&id=<?=$id?>' method='post'>nouveau sujet
        <input id="champTitre" type="text" name="titre" placeholder="Saisir un titre">
        <i id="boutonPlus" class="fa-solid fa-plus"></i>
        <textarea id="champMessage" type="text" name="1erMessage" placeholder="Saisir un message"></textarea>
        <input id="btnAjouter" type="submit" name="ajouterSujet" value="Créer sujet">
    </form>
<?php } ?>

    <?php
    foreach($sujets as $sujet){

        ?>
            <a href="index.php?ctrl=forum&action=listMessages&id=<?= $sujet->getId()?>">
                <div class="sujet">
                    <p class="titre"><?=$sujet->getTitre()?></p>
                    <p class="par">par</p>
                    <p class="pseudo"><?=$sujet->getVisiteur()->getPseudonyme()?></p>
                    <a class="verrouiller" href="index.php?ctrl=forum&action=verrouiller&id=<?= $sujet->getId()?>"><i class="fa-solid fa-lock"></i>Verrouiller</a>
                    <a class="supprimer" href="index.php?ctrl=forum&action=supprimerSujet&id=<?= $sujet->getId()?>"><i class="fa-solid fa-trash"></i>Supprimer<a>
                </div>
            </a>
        <?php
    }
    ?>
</div>





  
