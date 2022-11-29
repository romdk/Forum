<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste catégories</h1>

<?php
foreach($categories as $categorie){

    ?>
    <a href="index.php?ctrl=forum&action=listSujets">
        <p><?=$categorie->getNomCategorie()?></p>
        <p>dernier sujet</p>
    </a>
    <?php
    // ?id=<?= $categorie->getId() 
}
