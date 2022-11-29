<?php

$sujets = $result["data"]['sujets'];
    
?>

<h1>liste sujets</h1>

<?php
foreach($sujets as $sujet){

    ?>
    <a href="index.php?ctrl=forum&action=listMessages">
        <p><?=$sujet->getTitre()?></p>
        <p><?=$sujet->getVisiteur()->getPseudonyme()?></p>
        <p>dernier message</p>
    </a>
    <?php
    // ?id=<?= $sujet->getId()
}


  
