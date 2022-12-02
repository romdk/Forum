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
           
            return [
                "view" => VIEW_DIR."security/login.php"
            ];
        }

        public function inscription(){
            $ajoutVisiteur = new VisiteurManager();
            $mail = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
            $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasseConfirm = filter_input(INPUT_POST,'motDePasseConfirm',FILTER_SANITIZE_SPECIAL_CHARS);

            if($mail && $pseudonyme && $motDePasse && $motDePasseConfirm){
                $ajoutVisiteur->checkPseudo();
                if($checkPseudo != 'exist'){
                    $ajoutVisiteur->checkMail();
                    if($checkMail != 'exist'){
                        if($motDePasse === $motDePasseConfirm){
                            header("Location:index.php?ctrl=security&action=pageConnexion");
                            $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
                            $data = ['mail' => $mail, 'pseudonyme' => $pseudonyme, 'motDePasse' => $motDePasseHash];
                            return [
                                $ajoutVisiteur->add($data)
                            ];
                        }else{
                            header("Location:index.php?ctrl=security&action=pageInscription");
                            $_SESSION['message'] = "<div class='erreur'>Les mot de passes ne correspondent pas</div>";
                        }
                    }else{
                        header("Location:index.php?ctrl=security&action=pageInscription");
                        $_SESSION['message'] = "<div class='erreur'>Mail déjà utilisée</div>";
                    }
                }else{
                    header("Location:index.php?ctrl=security&action=pageInscription");
                    $_SESSION['message'] = "<div class='erreur'>Pseudonyme déjà utilisée</div>";
                }
            }else{
                header("Location:index.php?ctrl=security&action=pageInscription");
                $_SESSION['message'] = "<div class='erreur'>Formulaire incomplet</div>";
            }
        }  
        
        public function connexion(){
            $connexionVisiteur = new VisiteurManager();
            $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);

            if($motDePasseHash === getMotDePasse()){}


        }
    }
