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
                <span class='intitule'>Pseudonyme: </span><span class='contenu'> <?= $visiteur->getPseudonyme()?></span>
                <span class='intitule'>Inscrit le </span><span class='contenu'> <?= $visiteur->getDateInscription()?></span>
                <span class='intitule'>Role: </span><span class='contenu'> <?= $visiteur->getRole()?></span>
                <span class='intitule'>Mail: </span><span class='contenu'> <?= $visiteur->getMail()?></span>
                <span class='intitule'>dernier message: </span><span class='contenu'> <?= $messageManager->findLastMessageFromVisiteur($id)?></span>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
