<?php
use Model\Managers\SujetManager;
$messages = $result["data"]['messages'];
$sujetManager = new SujetManager();
$sujet = $sujetManager->findSujetById($id);    
?>
<a class="btnRetour" href="index.php?ctrl=forum&action=listSujets&id=<?=$sujet->getCategorie()->getId() ?>"><i class="fa-solid fa-caret-left"></i></a>
<div class="contenuPage">
    <div class="infoSujet">
        <div>
            <span class="intitule">Sujet: </span>
            <span class="contenu"><?php echo $sujet->getTitre() ?></span>
        </div>
        <div>
            <span class="intitule">par: </span>
            <a class="contenu" href="index.php?ctrl=forum&action=profilVisiteur&id=<?=$sujet->getVisiteur()->getId()?>"><?php echo $sujet->getVisiteur() ?></a>
        </div>
        <div>
            <span class="intitule">crée le: </span>
            <span class="contenu"><?php echo $sujet->getDateCreation() ?></span>
        </div>
    </div>

    <?php 
    if(App\Session::getVisiteur()){ 
        if($sujet->getStatut() == 0){ ?>
            <form class="nouveauMessage" action='index.php?ctrl=forum&action=ajoutMessage&id=<?=$id?>' method='post'>nouveau message
                        <textarea class="champMessage" type="text" name="message" placeholder="Saisir un message"></textarea>
                        <input class="btnAjouter" type="submit" name="ajouterMessage" value="Ajouter message">
            </form>
        <?php } 
    } ?>

    <div class="listeMessages">
        <?php
        if(isset($messages)){
            foreach($messages as $message){
                $idVisiteur = $message->getVisiteur()->getId();
                $pseudoVisiteur = $message->getVisiteur()->getPseudonyme();
                $roleVisiteur = $message->getVisiteur()->getRole();
                $imageVisiteur = $message->getVisiteur()->getImage();
                ?>            
                    <div class="message2">
                        <a class="pseudo" href="index.php?ctrl=forum&action=profilVisiteur&id=<?=$idVisiteur ?>"><span class="imageProfil"><img src="public/images/<?=$imageVisiteur?>" alt=""></span><?=$pseudoVisiteur?></a>
                        <p class="role"><?=$roleVisiteur?></p>
                        <p class="date"><?=$message->getDateCreation()?></p>
                        <p class="texte"><?=$message->getMessage()?></p>
                        <div class="interactions">
                            <?php if(App\Session::getVisiteur()){ ?>
                            <div class="vote">
                                <a href="index.php?ctrl=forum&action=upvoteMessage&id=<?= $message->getId()?>"><i class="fa-solid fa-up-long"></i></a>
                                <p><?=$message->getNbVote()?></p>
                                <a href="index.php?ctrl=forum&action=downvoteMessage&id=<?= $message->getId()?>"><i class="fa-solid fa-down-long"></i></a>
                            </div>
                            <?php
                                if(App\Session::isAdmin() || App\Session::getVisiteur()->getId() == $message->getVisiteur()->getId()){ ?>
                                    <div class="supprimer">
                                        <a class="btnSupprimer" href="index.php?ctrl=forum&action=supprimerMessage&id=<?= $message->getId()?>">Supprimer</a>
                                    </div>
                                <?php 
                                }
                            } ?>
                        </div>
                    </div>            
                <?php
            }
        }else{ ?>
            <p>Aucun message</p>
        <?php
        } 
    ?>
</div>


