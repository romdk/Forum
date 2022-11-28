<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\SujetManager;
    use Model\Managers\MessageManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){
          

           $sujetManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/listSujets.php",
                "data" => [
                    "sujets" => $sujetManager->findAll(["dateCreation", "DESC"])
                ]
            ];
        
        }

        

    }
