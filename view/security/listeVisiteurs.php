<?php
    use Model\Managers\MessageManager;
    $visiteurs = $result["data"]['visiteurs'];    
    ?>
<div class="listeVisiteurs">
    <ul>
        <?php
        foreach($visiteurs as $visiteur){
            $messageManager = new MessageManager();
            $id = $visiteur->getId();
            ?>
            <li class='infosVisiteur'>
                <span class='intitule'>Pseudonyme: </span><a href="index.php?ctrl=forum&action=profilVisiteur&id=<?=$id ?>" class='contenu'> <?= $visiteur->getPseudonyme()?></a>
                <span class='intitule'>Inscrit le </span><span class='contenu'> <?= $visiteur->getDateInscription()?></span>
                <span class='intitule'>Role: </span><span class='contenu'> <?= $visiteur->getRole()?></span>
                <span class='intitule'>Mail: </span><span class='contenu'> <?= $visiteur->getMail()?></span>
                <span class='intitule'>dernier message: </span>
                <?php
                if($messageManager->findLastMessageFromVisiteur($id) !== false){ ?>
                    <span class='contenu'> <?= $messageManager->findLastMessageFromVisiteur($id)?></span>
                <?php
                }else { ?>
                <span>Aucun message</span>
                <?php
                } ?>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
