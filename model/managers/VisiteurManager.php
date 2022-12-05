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

      public function findOneByPseudo($pseudonyme) {
        $sql = "SELECT * FROM $this->tableName WHERE pseudonyme = :pseudonyme"; 
            
        return $this->getOneOrNullResult(
          DAO::select($sql,['pseudonyme' => $pseudonyme]),
          $this->className
        );
          
      }

      public function findOneByMail($mail) {
          $sql = "SELECT * FROM $this->tableName WHERE mail = :mail";    
          return $this->getOneOrNullResult(
             DAO::select($sql,['mail' => $mail]),
             $this->className
          );

          
      }

      public function getMotDePasseHash($pseudonyme){
        $sql = "SELECT motDePasse FROM $this->tableName WHERE pseudonyme = :pseudonyme";

        
        return $this->getOneOrNullResult(
          DAO::select($sql,['pseudonyme' => $pseudonyme], false),
          $this->className
        );

        
  
      }
    }