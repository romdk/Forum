<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class SujetManager extends Manager{

        protected $className = "Model\Entities\Sujet";
        protected $tableName = "sujet";


        public function __construct(){
            parent::connect();
        }

        public function findSujetsByCategorie($id) {

            $sql = "SELECT *
                    FROM $this->tableName
                    WHERE categorie_id = :id";

            return $this->getMultipleResults(
                DAO::select($sql,['id' => $id]),
                $this->className
            );
        }

        public function findLastSujetByCategorie($id) {

            $sql = "SELECT *
                    FROM $this->tableName
                    WHERE dateCreation = (SELECT MAX(dateCreation) FROM $this->tableName WHERE categorie_id = :id)";

            return $this->getOneOrNullResult(
                DAO::select($sql,['id' => $id]),
                $this->className
            );
        }

        public function InsertSujet($id,$titre) {
            
            $sql = "INSERT INTO $this->tableName(visiteur_id,categorie_id,titre)
                    VALUES ('1',':id',':titre')
                    ";   
                    
            return $this->getOneOrNullResult(
                DAO::insert($sql,['id' => $id],['titre'=>$titre]),
                $this->className
            );           
                          
        }
    }