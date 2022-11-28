<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
use Model\Managers\CategorieManager;
use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){}

        public function listSujets(){          

           $sujetManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/listSujets.php",
                "data" => [
                    "sujets" => $sujetManager->findAll(["dateCreation", "DESC"])
                ]
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

        public function listMessages(){
            $messageManager = new MessageManager();

        }
        
        

        

    }
