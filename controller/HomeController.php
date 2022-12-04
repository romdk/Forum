<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\VisiteurManager;
    // use Model\Managers\SujetManager;
    // use Model\Managers\MessageManager;
    // use Model\Managers\CategorieManager;
    
    class HomeController extends AbstractController implements ControllerInterface{

        public function index(){
            unset($_SESSION["message"]);
            
           
                return [
                    "view" => VIEW_DIR."home.php"
                ];
            }
            
        
   
        public function visiteurs(){
            $this->restrictTo("ROLE_USER");

            $manager = new VisiteurManager();
            $visiteurs = $manager->findAll(['dateInscription', 'DESC']);

            return [
                "view" => VIEW_DIR."security/visiteurs.php",
                "data" => [
                    "visiteurs" => $visiteurs
                ]
            ];
        }

        public function forumRules(){
            
            return [
                "view" => VIEW_DIR."rules.php"
            ];
        }

        /*public function ajax(){
            $nb = $_GET['nb'];
            $nb++;
            include(VIEW_DIR."ajax.php");
        }*/
    }
