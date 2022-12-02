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
            $sql = "SELECT * FROM $this->tableName WHERE mail = $mail";

            if(mysqli_num_rows($sql)) {
                $checkMail = 'exist';              
            }
        }

        public function checkPseudo(){
            $sql = "SELECT * FROM $this->tableName WHERE pseudonyme = $pseudonyme";

            if(mysqli_num_rows($sql)) {
                $checkPseudo = 'exist';              
            }
        }


    }