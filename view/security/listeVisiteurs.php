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
                <p>Pseudonyme: <?= $visiteur->getPseudonyme()?></p>
                <p>Inscrit le <?= $visiteur->getDateInscription()?></p>
                <p>Role: <?= $visiteur->getRole()?></p>
                <p>Mail: <?= $visiteur->getMail()?></p>
                <p>dernier message: <?= $messageManager->findLastMessageFromVisiteur($id)?></p>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
