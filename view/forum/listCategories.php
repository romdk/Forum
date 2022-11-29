<?php

$categories = $result["data"]['categories'];
    
?>
<div class="listeCategories">
    <?php
    foreach($categories as $categorie){

        ?>
            <a href="index.php?ctrl=forum&action=listSujets">
                <div class="categorie">
                <p class="nomCategorie"><?=$categorie->getNomCategorie()?></p>
                <p>dernier sujet</p>
                </div>
            </a>
        <?php
        // ?id=<?= $categorie->getId() 
    }
    ?>
</div>
