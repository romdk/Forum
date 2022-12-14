<?php

$categories = $result["data"]['categories'];
    
?>
<div class="listeCategories">
<?php
    if(App\Session::isAdmin()){ ?>
        <form id="nouvelleCategorie" action='index.php?ctrl=forum&action=ajoutCategorie' method='post'>nouvelle catégorie
            <input id="champCategorie" type="text" name="nomCategorie" placeholder="Saisir un nom de catégorie">
            <input id="btnAjouter" type="submit" name="ajouterCategorie" value="Créer catégorie">
        </form>
    <?php 
    } 

    foreach($categories as $categorie){ ?>
        <div class="categorie">
            <a href="index.php?ctrl=forum&action=listSujets&id=<?= $categorie->getId()?>">
                <p class="nomCategorie"><?=$categorie->getNomCategorie()?></p>
            </a>
            <?php
            if(App\Session::isAdmin()) {
            ?>
                <a class="supprimer" href="index.php?ctrl=forum&action=supprimerCategorie&id=<?= $categorie->getId()?>"><i class="fa-solid fa-trash"></i>Supprimer</a>
                <?php
            } ?>
        </div>
        <?php
    }
    ?>
</div>
