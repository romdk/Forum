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

        public function findSujetById($id) {
            $sql = "SELECT *
                    FROM $this->tableName
                    WHERE id_sujet = :id";

            return $this->getOneOrNullResult(
                DAO::select($sql,['id' => $id], false),
                $this->className
            );

        }

        public function lock($id){
            $sql = "UPDATE $this->tableName
                    SET statut = '1'
                    WHERE id_".$this->tableName." = :id
                    ";

            return DAO::update($sql, ['id' => $id]); 
        }

        public function unlock($id){
            $sql = "UPDATE $this->tableName
                    SET statut = '0'
                    WHERE id_".$this->tableName." = :id
                    ";

            return DAO::update($sql, ['id' => $id]); 
        }
    }