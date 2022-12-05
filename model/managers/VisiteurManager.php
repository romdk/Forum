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

        function checkPseudo($pseudonyme) {
            $sql = "SELECT * FROM $this->tableName WHERE pseudonyme = :pseudonyme";    
            $result = DAO::select($sql,['pseudonyme' => $pseudonyme]);
            if ($result != null) {
              return true;
            } else {
              return false;
            }
        }
        
        function checkMail($mail) {
            $sql = "SELECT * FROM $this->tableName WHERE mail = :mail";    
            $result = DAO::select($sql,['mail' => $mail]);
            if ($result != null) {
              return true;
            } else {
              return false;
            }
        }
    }