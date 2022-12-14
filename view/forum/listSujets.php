<?php

$sujets = $result["data"]['sujets'];
    
?>
<a class="btnRetour" href="index.php?ctrl=forum&action=listCategories"><i class="fa-solid fa-caret-left"></i></a>
<div class="contenuPage">
    <div class="listeSujets">
        <?php
        if(App\Session::getVisiteur()){ ?>
            <form id="nouveauSujet" action='index.php?ctrl=forum&action=ajoutSujet&id=<?=$id?>' method='post'><span>Nouveau sujet</span>
                <input id="champTitre" type="text" name="titre" placeholder="Saisir un titre">
                <i id="boutonPlus" class="fa-solid fa-plus"></i>
                <textarea id="champMessage" type="text" name="1erMessage" placeholder="Saisir un message"></textarea>
                <input id="btnAjouter" type="submit" name="ajouterSujet" value="Créer sujet">
            </form>
        <?php 
        } 
        if(isset($sujets)){
            foreach($sujets as $sujet){ ?>
                <div class="sujet">
                    <a class="lienSujet" href="index.php?ctrl=forum&action=listMessages&id=<?= $sujet->getId()?>">
                        <p class="titre"><?=$sujet->getTitre()?></p>
                        <p class="par">par</p>
                        <p class="pseudo"><?=$sujet->getVisiteur()->getPseudonyme()?></p>
                    </a>
                    <?php
                    if(App\Session::getVisiteur()){
                        if(App\Session::isAdmin() || App\Session::getVisiteur()->getId() == $sujet->getVisiteur()->getId()){
                            if($sujet->getStatut() == 0){ ?>
                                <a class="statut unlocked" href="index.php?ctrl=forum&action=verrouillerSujet&id=<?= $sujet->getId()?>"><i class="fa-solid fa-lock-open"></i>Sujet actif</a>
                            <?php
                            }else{ ?>
                                <a class="statut locked" href="index.php?ctrl=forum&action=deverrouillerSujet&id=<?= $sujet->getId()?>"><i class="fa-solid fa-lock"></i>Sujet vérouillé</a>
                            <?php } ?>
                            <?php
                        } ?>
                        <?php
                        if(App\Session::isAdmin() || App\Session::getVisiteur()->getId() == $sujet->getVisiteur()->getId()) {
                        ?>
                            <a class="supprimer" href="index.php?ctrl=forum&action=supprimerSujet&id=<?= $sujet->getId()?>"><i class="fa-solid fa-trash"></i>Supprimer</a>
                        <?php }
                    } ?>
                </div>
            <?php
            }
        }else{ ?>
        <p>Aucun sujet</p>
        
        <?php
        }
        ?>
    </div>
</div>





  
