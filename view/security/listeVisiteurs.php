<?php
    $visiteurs = $result["data"]['visiteurs'];    
?>
<div class="listeVisiteurs">
    <ul>
        <?php
        foreach($visiteurs as $visiteur){

            ?>
            <li>
                <p>Pseudonyme: <?= $visiteur->getPseudonyme()?></p>
                <p>Inscrit le <?= $visiteur->getDateInscription()?></p>
                <p>Role: <?= $visiteur->getRole()?></p>
                <p>Mail: <?= $visiteur->getMail()?></p>
            </li>
            <?php
        }
        ?>
    </ul>
</div>
