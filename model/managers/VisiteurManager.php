<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class VisiteurManager extends Manager{

        protected $className = "Model\Entities\Visiteur";
        protected $tableName = "visiteur";


        public function __construct(){
            parent::connect();
        }

        public function checkMail(){
            $mail = filter_input(INPUT_POST,'mail',FILTER_VALIDATE_EMAIL);
            $sql = "SELECT * FROM $this->tableName WHERE mail = $mail";

            if(mysqli_num_rows($sql)) {
                $checkMail = 'exist';              
            }
        }

        public function checkPseudo(){
            $pseudonyme = filter_input(INPUT_POST,'pseudonyme',FILTER_SANITIZE_SPECIAL_CHARS);
            $sql = "SELECT * FROM $this->tableName WHERE pseudonyme = $pseudonyme";

            if(mysqli_num_rows($sql)) {
                $checkPseudo = 'exist';              
            }
        }


    }