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
                <div><span class='intitule'>Pseudonyme: </span><a href="index.php?ctrl=forum&action=profilVisiteur&id=<?=$id ?>" class='contenu'> <?= $visiteur->getPseudonyme()?></a></div>
                <div><span class='intitule'>Inscrit le </span><span class='contenu'> <?= $visiteur->getDateInscription()?></span></div>
                <div><span class='intitule'>Role: </span><span class='contenu'> <?= $visiteur->getRole()?></span></div>
                <div><span class='intitule'>Mail: </span><span class='contenu'> <?= $visiteur->getMail()?></span></div>
                <div><span class='intitule'>dernier message: </span></div>
                <?php
                if($messageManager->findLastMessageFromVisiteur($id) !== false){ ?>
                    <div><span class='contenu'> <?= $messageManager->findLastMessageFromVisiteur($id)?></span></div>
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
