<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        public function findMessagesBySujet($id) {

            $sql = "SELECT *
                    FROM $this->tableName
                    WHERE sujet_id = :id
                    ORDER BY dateCreation DESC";

            return $this->getMultipleResults(
                DAO::select($sql,['id' => $id]),
                $this->className
            );
        }
    }