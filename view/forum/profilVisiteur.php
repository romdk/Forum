
<?php 
use Model\Managers\VisiteurManager;
use Model\Managers\MessageManager;
$visiteurManager = new VisiteurManager();
$messageManager = new MessageManager();
$id=(isset($_GET["id"])) ? $_GET["id"] : null;
$visiteur = $visiteurManager->findOneById($id);
            ?>
            <div class="profil">
                <div class='infosVisiteur'>
                    <span class='intitule'>Pseudonyme: </span><span class='contenu'> <?= $visiteur->getPseudonyme()?></span>
                    <span class='intitule'>Inscrit le </span><span class='contenu'> <?= $visiteur->getDateInscription()?></span>
                    <span class='intitule'>Role: </span><span class='contenu'> <?= $visiteur->getRole()?></span>
                    <span class='intitule'>Mail: </span><span class='contenu'> <?= $visiteur->getMail()?></span>
                    <span class='intitule'>dernier message: </span><span class='contenu'> <?= $messageManager->findLastMessageFromVisiteur($id)?></span>
                    <?php
                    if($visiteur->getStatut() == 0){ ?>
                        <a class="btnBannir" href="index.php?ctrl=security&action=banVisiteur&id=<?=$id?>">Bannir</a>
                    <?php 
                    } else{ ?>
                        <a class="btnDebannir" href="index.php?ctrl=security&action=unbanVisiteur&id=<?=$id?>">Débannir</a>
                    <?php
                    }
                    ?>
                </div>
            </div>