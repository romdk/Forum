<?php

$messages = $result["data"]['messages'];
    
?>

<div class="infoSujet">
    <p>Titre du sujet</p>
    <p>auteur du sujet</p>
    <p>date de creation du sujet</p>
</div>

<?php 
if(App\Session::getVisiteur()){ ?>
    <form class="nouveauMessage" action='index.php?ctrl=forum&action=ajoutMessage&id=<?=$id?>' method='post'>nouveau message
                <textarea class="champMessage" type="text" name="message" placeholder="Saisir un message"></textarea>
                <input class="btnAjouter" type="submit" name="ajouterMessage" value="Ajouter message">
    </form>
<?php } ?>

<div class="listeMessages">
    <?php
    foreach($messages as $message){
        ?>            
            <div class="message2">
                <a class="pseudo" href="index.php?ctrl=forum&action=profilVisiteur&id=<?=$message->getVisiteur()->getId() ?>"><?=$message->getVisiteur()->getPseudonyme()?></a>
                <p class="role"><?=$message->getVisiteur()->getRole()?></p>
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
?>


