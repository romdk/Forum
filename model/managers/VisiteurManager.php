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

        function checkVisiteur($pseudonyme, $mail) {
            $sql = "SELECT * FROM $this->$tableName WHERE pseudonyme='$pseudonyme' OR mail='$mail'";    
            $result = mysqli_query(DAO::$bdd, $sql);
            if (mysqli_num_rows($result) > 0) {
              return true;
            } else {
              return false;
            }
        }
    }