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
          DAO::select($sql,['pseudonyme' => $pseudonyme], false),
          $this->className
        );          
      }

      public function findOneById($id) {
        $sql = "SELECT * FROM $this->tableName WHERE id_visiteur = :id"; 
            
        return $this->getOneOrNullResult(
          DAO::select($sql,['id' => $id], false),
          $this->className
        );          
      }

      public function findOneByMail($mail) {
          $sql = "SELECT * FROM $this->tableName WHERE mail = :mail";    
          return $this->getOneOrNullResult(
             DAO::select($sql,['mail' => $mail], false),
             $this->className
          );

          
      }

      public function getMotDePasseBdd($pseudonyme){
        $sql = "SELECT motDePasse FROM $this->tableName WHERE pseudonyme = :pseudonyme";
       
        return $this->getOneOrNullResult(
          DAO::select($sql,['pseudonyme' => $pseudonyme], false),
          $this->className
        );
      }

      public function ban($id){
        $sql = "UPDATE $this->tableName
                SET statut = '1'
                WHERE id_".$this->tableName." = :id
                ";

        return DAO::update($sql, ['id' => $id]); 
    }

      public function unban($id){
        $sql = "UPDATE $this->tableName
                SET statut = '0'
                WHERE id_".$this->tableName." = :id
                ";

        return DAO::update($sql, ['id' => $id]); 
    }


    }