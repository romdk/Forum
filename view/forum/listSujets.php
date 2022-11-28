<?php

$sujets = $result["data"]['sujets'];
    
?>

<h1>liste sujets</h1>

<?php
foreach($sujets as $sujet){

    ?>
    <p><a href="index.php?ctrl=forum&action=listMessages?id=<?= $sujet->getId() ?>"><?=$sujet->getTitre()?></a></p>
    <?php
}


  
