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

        public function findLastMessageFromVisiteur($id){

            $sql = "SELECT *
                    FROM $this->tableName
                    WHERE visiteur_id = :id";

            return $this->getOneOrNullResult(
                DAO::select($sql,['id' => $id], false),
                $this->className
             );
        }

        public function deleteAllMessageFromSujet($id){
            $sql = "DELETE FROM ".$this->tableName."
                    WHERE sujet_id = :id
                    ";

            return DAO::delete($sql, ['id' => $id]);
        }

        public function upvote($id){
            if(!isset($_SESSION['vote'][$id])){
                $sql = "UPDATE $this->tableName
                        SET nbVote = nbVote+1
                        WHERE id_".$this->tableName." = :id
                        ";
                $_SESSION['vote'][$id] = upvote;
                return DAO::update($sql, ['id' => $id]);
            }
            else if($_SESSION['vote'][$id] == downvote){
                $sql = "UPDATE $this->tableName
                        SET nbVote = nbVote+1
                        WHERE id_".$this->tableName." = :id
                        ";

                unset($_SESSION['vote'][$id]);
                return DAO::update($sql, ['id' => $id]);
            }
        }

        public function downvote($id){
            if(!isset($_SESSION['vote'][$id])){
                $sql = "UPDATE $this->tableName
                        SET nbVote = nbVote-1
                        WHERE id_".$this->tableName." = :id
                        ";

                $_SESSION['vote'][$id] = downvote;
                return DAO::update($sql, ['id' => $id]);
            }
            
            else if($_SESSION['vote'][$id] == upvote){
                $sql = "UPDATE $this->tableName
                        SET nbVote = nbVote-1
                        WHERE id_".$this->tableName." = :id
                        ";

                unset($_SESSION['vote'][$id]);
                return DAO::update($sql, ['id' => $id]);
            }
        }
    }