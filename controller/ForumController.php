<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\CategorieManager;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    use Model\Managers\VisiteurManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        
        public function index(){}

        public function profilVisiteur(){     
            
            $visiteurManager = new VisiteurManager();
            $id=(isset($_GET["id"])) ? $_GET["id"] : null;

            return [
                "view" => VIEW_DIR."forum/profilVisiteur.php",
            ];

        }
        
        public function listCategories(){
            
            $categorieManager = new CategorieManager();
            
            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categorieManager->findAll(["nomCategorie","ASC"])
                    ]
                ];
            }
            
        public function ajoutCategorie(){
            $categorieManager = new CategorieManager();
            $nomCategorie = filter_input(INPUT_POST,'nomCategorie',FILTER_SANITIZE_SPECIAL_CHARS);

            if($nomCategorie){            
                $dataCategorie = ['nomCategorie' => $nomCategorie];
                $categorieManager->add($dataCategorie);
                Session::addFlash('success','Catégorie créé');
                self::redirectTo('forum','listCategories');
            }else {
                Session::addFlash('error','Champ vide');
                self::redirectTo('forum','listCategories');
            }
        }

        public function listSujets(){     
            
            $sujetManager = new SujetManager();
            $id=(isset($_GET["id"])) ? $_GET["id"] : null;

            return [
                "view" => VIEW_DIR."forum/listSujets.php",
                "data" => [
                    "sujets" => $sujetManager->findSujetsByCategorie($id)
                ]
            ];

        }          

        public function listSujetsSearchbar(){     
            
            $sujetManager = new SujetManager();
            $id=(isset($_GET["id"])) ? $_GET["id"] : null;

            return [
                "view" => VIEW_DIR."layout.php",
                "data" => [
                    "sujets" => $sujetManager->findSujetsByCategorie($id)
                ]
            ];

        }          
        
        public function listMessages(){
            
            $messageManager = new MessageManager();
            $id=(isset($_GET["id"])) ? $_GET["id"] : null;
            $messages = $messageManager->findMessagesBySujet($id);

            return [
                "view" => VIEW_DIR."forum/listMessages.php",
                "data" => [
                    "messages" => $messages
                    ]
                ];
                
            }
        public function ajoutSujet(){
            $sujetManager = new SujetManager();
            $messageManager = new MessageManager();
            $categorieId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $titre = filter_input(INPUT_POST,'titre',FILTER_SANITIZE_SPECIAL_CHARS);
            $message = filter_input(INPUT_POST,'1erMessage',FILTER_SANITIZE_SPECIAL_CHARS);

            if($titre && $message){            
                $dataSujet = ['visiteur_id' => Session::getVisiteur()->getId(), 'categorie_id' => $categorieId, 'titre' => $titre];
                $dataMessage = ['visiteur_id' => Session::getVisiteur()->getId(), 'sujet_id' => $sujetManager->add($dataSujet), 'message' => $message];
                $messageManager->add($dataMessage);
                Session::addFlash('success','Sujet créé');
                self::redirectTo('forum','listSujets',$categorieId);
            }else {
                Session::addFlash('error','Champ vide');
                self::redirectTo('forum','listSujets',$categorieId);
            }
        }

        public function supprimerCategorie(){
            $categorieManager = new CategorieManager();
            $sujetManager = new SujetManager();
            $messageManager = new MessageManager();
            $categorieId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $messageManager->deleteAllMessageFromCategorie($categorieId);
            $sujetManager->deleteAllSujetFromCategorie($categorieId);    
            $categorieManager->delete($categorieId);
            Session::addFlash('success','categorie supprimé');
            self::redirectTo('forum','listCategories');
        }
        public function supprimerSujet(){
            $sujetManager = new SujetManager();
            $messageManager = new MessageManager();
            $sujetId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $categorieId = $sujetManager->findSujetById($sujetId)->getCategorie()->getId();
            $messageManager->deleteAllMessageFromSujet($sujetId);
            $sujetManager->delete($sujetId);
            Session::addFlash('success','Sujet supprimé');
            self::redirectTo('forum','listSujets',$categorieId);
        }

        public function verrouillerSujet(){
            $sujetManager = new SujetManager();
            $sujetId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $categorieId = $sujetManager->findSujetById($sujetId)->getCategorie()->getId();
            $sujetManager->lock($sujetId);
            Session::addFlash('success','Sujet verouillé');
            self::redirectTo('forum','listSujets',$categorieId);
        }

        public function deverrouillerSujet(){
            $sujetManager = new SujetManager();
            $sujetId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $categorieId = $sujetManager->findSujetById($sujetId)->getCategorie()->getId();
            $sujetManager->unlock($sujetId);
            Session::addFlash('success','Sujet déverrouillé');
            self::redirectTo('forum','listSujets',$categorieId);
        }

        public function ajoutMessage(){
            $messageManager = new MessageManager();
            $sujetId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $message = filter_input(INPUT_POST,'message',FILTER_SANITIZE_SPECIAL_CHARS);

            if($message){
                $data = ['visiteur_id' => Session::getVisiteur()->getId(), 'sujet_id' => $sujetId, 'message' => $message];
                $messageManager->add($data);
                Session::addFlash('success','Message ajouté');
                self::redirectTo('forum','listMessages',$sujetId);
            }else {
                Session::addFlash('error','Aucun message');
                self::redirectTo('forum','listMessages',$sujetId);
            }
        }

        public function supprimerMessage(){
            $messageManager = new MessageManager();
            $messageId=(isset($_GET["id"])) ? $_GET["id"] : null; 
            $sujetId = $messageManager->findMessageById($messageId)->getSujet()->getId();
            $messageManager->delete($messageId);
            Session::addFlash('success','Message supprimé');
            self::redirectTo('forum','listMessages',$sujetId);
        }

        public function upvoteMessage(){
            $messageManager = new MessageManager();
            $messageId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $messageManager->upvote($messageId);
            $sujetId = $messageManager->findMessageById($messageId)->getSujet()->getId();
            self::redirectTo('forum','listMessages',$sujetId);
        }

        public function downvoteMessage(){
            $messageManager = new MessageManager();
            $messageId=(isset($_GET["id"])) ? $_GET["id"] : null;
            $messageManager->downvote($messageId);
            $sujetId = $messageManager->findMessageById($messageId)->getSujet()->getId();
            self::redirectTo('forum','listMessages',$sujetId);
        }
    }
