<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste catégories</h1>

<?php
foreach($categories as $categorie){

    ?>
    <p><a href="index.php?ctrl=forum&action=listSujets?id=<?= $categorie->getId() ?>"><?=$categorie->getNomCategorie()?></a></p>
    <?php
}
