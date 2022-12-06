<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
    use Model\Managers\VisiteurManager;
    
    class SecurityController extends AbstractController implements ControllerInterface{

        
        public function pageInscription(){            
           
            return [
                "view" => VIEW_DIR."security/register.php"
            ];
        }
        
        public function pageConnexion(){     
            unset($_SESSION["message"]);       
           
            return [
                "view" => VIEW_DIR."security/login.php"
            ];
        }

        public function inscription(){
            $visiteurManager = new VisiteurManager();

            if(isset($_POST['validerInscription'])) {
                $mail = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
                $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
                $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);
                $motDePasseConfirm = filter_input(INPUT_POST,'motDePasseConfirm',FILTER_SANITIZE_SPECIAL_CHARS);

                if($mail && $pseudonyme && $motDePasse && $motDePasseConfirm){
                    if ($visiteurManager->findOneByPseudo($pseudonyme)) {
                        Session::addFlash('error','Pseudonyme déjà utilisé');
                        self::redirectTo('security','pageInscription',null);
                    } else {
                        if ($visiteurManager->findOneByMail($mail)) {
                            Session::addFlash('error','Mail déjà utilisé');
                            self::redirectTo('security','pageInscription',null);
                        } else {
                            if($motDePasse !== $motDePasseConfirm){
                                Session::addFlash('error','Les mots de passes ne correspondent pas');
                                self::redirectTo('security','pageInscription',null);
                            } else {
                                $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
                                $data = ['mail' => $mail, 'pseudonyme' => $pseudonyme, 'motDePasse' => $motDePasseHash];
                                $visiteurManager->add($data);
                                Session::addFlash('success','Inscription réussie');
                                self::redirectTo('security','pageConnexion',null);
                            }
                        }
                    }
                }
                else{
                    Session::addFlash('error','Champ manquant');
                    self::redirectTo('security','pageInscription',null);
                    exit();
                }
            }
        }

        public function connexion(){
            $visiteurManager = new VisiteurManager();

            if(isset($_POST['validerConnexion'])) {

                $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
                $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);

                if ($pseudonyme && $motDePasse) {
                    $motDePasseBdd = $visiteurManager->getMotDePasseBdd($pseudonyme);
                    if($motDePasseBdd){
                        $motDePasseHash = $motDePasseBdd->getMotDePasse();
                        $visiteur = $visiteurManager->findOneByPseudo($pseudonyme);
                        if (password_verify($motDePasse, $motDePasseHash)) {
                            Session::setVisiteur($visiteur);
                            // var_dump($visiteur);die;
                            // var_dump(Session::getVisiteur());die;
                            // var_dump(Session::getVisiteur()->$visiteurManager->hasRole('Admin')); die;

                            header("Location: index.php");
                        } else {
                            Session::addFlash('error','Mot de passe incorrect');
                            self::redirectTo('security','pageConnexion',null);
                        }
                    }
                } else {
                Session::addFlash('error','Champ manquant');
                self::redirectTo('security','pageConnexion',null);
                }
            }
        }

        public function deconnexion(){
            Session::unsetVisiteur();
            self::redirectTo('security','pageConnexion',null);
        }
    }
