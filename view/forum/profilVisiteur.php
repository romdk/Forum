
<?php 
use Model\Managers\VisiteurManager;
use Model\Managers\MessageManager;
$visiteurManager = new VisiteurManager();
$messageManager = new MessageManager();
$id=(isset($_GET["id"])) ? $_GET["id"] : null;
$visiteur = $visiteurManager->findOneById($id);
if(isset($_FILES['image'])){
    var_dump('test');die;
    $tmpName = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    move_uploaded_file($tempName,'public/images'.$name);
}
// $activites = $visiteurManager->find5LastActivityFromVisiteur($id)
            ?>
            <div class="profil">
                <div class='infosVisiteur'>
                    <div><span class='intitule'>Pseudonyme: </span><span class='contenu'> <?= $visiteur->getPseudonyme()?></span></div>
                    <div><span class='intitule'>Inscrit le </span><span class='contenu'> <?= $visiteur->getDateInscription()?></span></div>
                    <div><span class='intitule'>Role: </span><span class='contenu'> <?= $visiteur->getRole()?></span></div>
                    <div><span class='intitule'>Mail: </span><span class='contenu'> <?= $visiteur->getMail()?></span></div>
                    <div><span class='intitule'>dernier message: </span></div>
                    <?php
                    if($messageManager->findLastMessageFromVisiteur($id) !== false){ ?>
                       <div><span class='contenu'> <?= $messageManager->findLastMessageFromVisiteur($id)?></span></div>
                    <?php
                    }else { ?>
                        <span>Aucun message</span>
                    <?php
                    }
                    if(App\Session::isAdmin()){ ?>
                        <form class="formRole" action="index.php?ctrl=security&action=attribuerRole&id=<?=$id ?>" method="post">
                            <select name="role" id="selectRole">
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                                <input class="btnValider" type="submit" name="validerRole" value="Valider" enctype="multipart/form-data">
                            </select>
                        </form>
                        <?php
                        if($visiteur->getStatut() == 0){ ?>
                            <a class="btnBannir" href="index.php?ctrl=security&action=banVisiteur&id=<?=$id?>">Bannir</a>
                        <?php 
                        } else{ ?>
                            <a class="btnDebannir" href="index.php?ctrl=security&action=unbanVisiteur&id=<?=$id?>">Débannir</a>
                        <?php
                        }
                    } ?>
                </div>
                    <?php 
                    if(App\Session::getVisiteur()->getId() == $id){?>
                    <div class="modifProfil">
                        Modifier profil
                        <form class="formModif" action="index.php?ctrl=security&action=modifierProfil&id=<?=$id?>" method='post'>
                            <input class="champPseudo" type="text" name="pseudonyme" placeholder="Saisir un pseudonyme">
                            <input class="champMail" type="email" name="mail" placeholder="Saisir une adresse email valide">
                            <input class="champImage" type="file" name="image">
                            <input class="btnValider" type="submit" name="validerChangement" value="Valider">
                        </form>
                    </div>

                    <?php 
                    }
                        ?>  
            </div>