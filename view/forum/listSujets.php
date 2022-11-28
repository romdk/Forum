<?php

$sujets = $result["data"]['sujets'];
    
?>

<h1>liste sujets</h1>

<?php
foreach($sujets as $sujet){

    ?>
    <p><?=$sujet->getTitre()?></p>
    <?php
}


  
