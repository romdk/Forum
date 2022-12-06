<?php

$categories = $result["data"]['categories'];
    
?>
<div class="listeCategories">
    <?php
    foreach($categories as $categorie){

        ?>
            <a href="index.php?ctrl=forum&action=listSujets&id=<?= $categorie->getId()?>">
                <div class="categorie">
                <p class="nomCategorie"><?=$categorie->getNomCategorie()?></p>
                </div>
            </a>
        <?php
    }
    ?>
</div>
