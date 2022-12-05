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
            $mail = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
            $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasseConfirm = filter_input(INPUT_POST,'motDePasseConfirm',FILTER_SANITIZE_SPECIAL_CHARS);

            if($mail && $pseudonyme && $motDePasse && $motDePasseConfirm){
                if ($visiteurManager->findOneByPseudo($pseudonyme)) {
                    $_SESSION['message'] = "<div class='erreur'>Pseudonyme déjà utilisé</div>";
                    header("Location:index.php?ctrl=security&action=pageInscription");
                  } else {
                    if ($visiteurManager->findOneByMail($mail)) {
                        $_SESSION['message'] = "<div class='erreur'>Mail déjà utilisé</div>";
                        header("Location:index.php?ctrl=security&action=pageInscription");
                      } else {
                        if($motDePasse !== $motDePasseConfirm){
                            $_SESSION['message'] = "<div class='erreur'>Les mot de passes ne correspondent pas</div>";
                            header("Location:index.php?ctrl=security&action=pageInscription");
                        } else {
                            $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
                            $data = ['mail' => $mail, 'pseudonyme' => $pseudonyme, 'motDePasse' => $motDePasseHash];
                            return [$visiteurManager->add($data)];
                            $_SESSION['message'] = "<div class='message'>Inscription réussie</div>";
                            header("Location:index.php?ctrl=security&action=pageConnexion");
                        }
                    }
                }
            }
            else{
                $_SESSION['message'] = "<div class='erreur'>Formulaire incomplet</div>";
                header("Location:index.php?ctrl=security&action=pageInscription");
                exit();
            }
        }

        public function connexion(){
            $visiteurManager = new VisiteurManager();
            $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);

            if ($pseudonyme && $motDePasse) {
                $motDePasseHash = $visiteurManager->getMotDePasseHash($pseudonyme);
                var_dump($motDePasse);
                var_dump($motDePasseHash); die;

                if (password_verify($motDePasse, $motDePasseHash)) {
                    $visiteur = $visiteurManager->findOneByPseudo($pseudonyme);
                    // var_dump($visiteur); die;
                    Session::setVisiteur($visiteur);
                    header("Location: index.php");
                } else {
                    $_SESSION['message'] = "<div class='erreur'>Mot de passe incorrect</div>";
                }
            } else {
            $_SESSION['message'] = "<div class='erreur'>Champ manquant</div>";
            }
        }
    }
