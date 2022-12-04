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
            $ajoutVisiteur = new VisiteurManager();
            $mail = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
            $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);
            $motDePasseConfirm = filter_input(INPUT_POST,'motDePasseConfirm',FILTER_SANITIZE_SPECIAL_CHARS);

            if($mail && $pseudonyme && $motDePasse && $motDePasseConfirm){
                if ($ajoutVisiteur->checkVisiteur($mail, $pseudonyme)) {
                    $_SESSION['message'] = "<div class='erreur'>Pseudonyme ou email déjà utilisé.</div>";
                  } else {
                        if($motDePasse !== $motDePasseConfirm){
                            $_SESSION['message'] = "<div class='erreur'>Les mot de passes ne correspondent pas</div>";
                        } else {
                            $motDePasseHash = password_hash($motDePasse, PASSWORD_DEFAULT);
                            $data = ['mail' => $mail, 'pseudonyme' => $pseudonyme, 'motDePasse' => $motDePasseHash];
                            return [$ajoutVisiteur->add($data)];
                            $_SESSION['message'] = "<div class='message'>Inscription réussie</div>";
                            header("Location:index.php?ctrl=security&action=pageConnexion");
                            exit();
                        }
                    }
                }
            else{
                $_SESSION['message'] = "<div class='erreur'>Formulaire incomplet</div>";
                header("Location:index.php?ctrl=security&action=pageInscription");
                exit();
            }
        }

        // public function connexion(){
        //     $connexionVisiteur = new VisiteurManager();
        //     $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
        //     $motDePasse = filter_input(INPUT_POST,'motDePasse',FILTER_SANITIZE_SPECIAL_CHARS);

        //     if ($pseudonyme && $motDePasse) {
        //         $sql = "SELECT motDePasse FROM $this->$tableName WHERE pseudonyme='$pseudonyme'";
        //         $result = mysqli_query(DAO::$bdd, $sql);
        //         $motDePasseHash = mysqli_fetch_assoc($result)['motDePasse'];
    
        //         if (password_verify($motDePasse, $motDePasseHash)) {
        //           $sql = "SELECT * FROM $this->$tableName WHERE pseudonyme='$pseudonyme'";
        //           $result = mysqli_query(DAO::$bdd, $sql);
        //           $visiteur = mysqli_fetch_assoc($result);

        //           App\Session::setVisiteur($visiteur);

        //           header("Location: index.php");
        //           exit();
        //         } else {
        //             $_SESSION['message'] = "<div class='erreur'>Mot de passe incorreect</div>";
        //         }
        //     } else {
        //     $_SESSION['message'] = "<div class='erreur'>Champ manquant</div>";
        //     }
        // }
    }
