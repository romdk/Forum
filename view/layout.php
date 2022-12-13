<?php 
use Model\Managers\SujetManager;
use Model\Managers\VisiteurManager;
$sujetManager = new SujetManager();
$visiteurManager = new VisiteurManager();
$sujets = $sujetManager->findAll(["titre","ASC"]);
$visiteurs = $visiteurManager->findAll(["pseudonyme","ASC"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/zg3mwraazn1b2ezih16je1tc6z7gwp5yd4pod06ae5uai8pa/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
    <title>FORUM</title>
</head>
<body>
    <div id="wrapper"> 
       
        <div id="mainpage">
            <!-- c'est ici que les messages (erreur ou succès) s'affichent-->
            <h3 class="message" style="color: red"><?= App\Session::getFlash("error") ?></h3>
            <h3 class="message" style="color: green"><?= App\Session::getFlash("success") ?></h3>
            <header>
                <nav>
                    <div id="nav-left">
                        <a class="titre" href="index.php">Forum.</a>
                    </div>
                    <div class='searchbar' >
                        <input type="text" id="searchBar" onkeyup="affSuggestions()"  placeholder="Rechercher un sujet, un utilisateur..."><i class="fa-solid fa-magnifying-glass"></i>
                        <ul id='suggestions'>
                        <?php
                        if(isset($sujets)){
                            foreach($sujets as $sujet) { ?>
                                <li class='suggestion'>
                                    <a href="index.php?ctrl=forum&action=listMessages&id=<?=$sujet->getId()?>"><p><?=$sujet->getTitre()?></p></a>
                                </li>
                            <?php }
                        } ?>  
                        <?php
                        if(isset($visiteurs)){
                            foreach($visiteurs as $visiteur) { 
                                $imageVisiteur = $visiteur->getImage(); ?>
                            
                                <li class='suggestion'>
                                    <a href="index.php?ctrl=forum&action=listVisiteurs&id=<?=$visiteur->getId()?>"><span class="imageProfil"><img src="public/images/<?=$imageVisiteur?>" alt=""></span><span class="pseudo"><?=$visiteur->getPseudonyme()?></span><span class="role"><?=$visiteur->getRole()?></span></a>
                                </li>
                            <?php } 
                        }?>  
                        </ul>                      
                    </div>
                    <div id="nav-right">
                    <?php
                        
                        if(App\Session::getVisiteur()){
                            $idVisiteur = App\Session::getVisiteur()->getId();    
                            $imageVisiteur = App\Session::getVisiteur()->getImage();
                            // var_dump($imageVisiteur); die;                        
                            ?>
                            <a href="index.php?ctrl=forum&action=profilVisiteur&id=<?=$idVisiteur ?>"><div class="imageProfil"><img src="public/images/<?=$imageVisiteur?>" alt=""></div><?= App\Session::getVisiteur()?></a>
                            <a href="index.php?ctrl=security&action=deconnexion">Déconnexion</a>
                            <?php
                        }
                        else{
                            ?>
                            <a href="index.php?ctrl=security&action=pageConnexion">Connexion</a>
                            <a href="index.php?ctrl=security&action=pageInscription">Inscription</a>
                        <?php
                        }
                        if(App\Session::isAdmin()){
                            ?>
                            <a id='utilisateurs' href="index.php?ctrl=home&action=listeVisiteurs">Liste Utilisateurs</a>
                          
                            <?php
                        }
                        ?>
                    </div>
                </nav>
            </header>
            
            <main id="forum">
                <?= $page ?>
            </main>
        </div>
        <footer>
            <p>&copy; 2020 - Forum CDA - <a href="/home/forumRules.html">Règlement du forum</a> - <a href="">Mentions légales</a></p>
            <!--<button id="ajaxbtn">Surprise en Ajax !</button> -> cliqué <span id="nbajax">0</span> fois-->
        </footer>
    </div>
    <script src="public/js/ajoutSujet.js"></script>
    <script src="public/js/searchbar.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
    </script>
    <script>

        $(document).ready(function(){
            $(".message").each(function(){
                if($(this).text().length > 0){
                    $(this).slideDown(500, function(){
                        $(this).delay(3000).slideUp(500)
                    })
                }
            })
            $(".delete-btn").on("click", function(){
                return confirm("Etes-vous sûr de vouloir supprimer?")
            })
            tinymce.init({
                selector: '.post',
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_css: '//www.tiny.cloud/css/codepen.min.css'
            });
        })

        

        /*
        $("#ajaxbtn").on("click", function(){
            $.get(
                "index.php?action=ajax",
                {
                    nb : $("#nbajax").text()
                },
                function(result){
                    $("#nbajax").html(result)
                }
            )
        })*/
    </script>
</body>
</html>