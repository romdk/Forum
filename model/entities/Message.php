<?php
    namespace Model\Entities;

    use App\Entity;

    final class Message extends Entity{

        private $id;
        private $visiteur;
        private $sujet;
        private $message;
        private $dateCreation;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of visiteur
         */ 
        public function getVisiteur()
        {
                return $this->visiteur;
        }

        /**
         * Set the value of visiteur
         *
         * @return  self
         */ 
        public function setVisiteur($visiteur)
        {
                $this->visiteur = $visiteur;

                return $this;
        }

        /**
         * Get the value of visiteur
         */ 
        public function getSujet()
        {
                return $this->sujet;
        }

        /**
         * Set the value of sujet
         *
         * @return  self
         */ 
        public function setSujet($sujet)
        {
                $this->sujet = $sujet;

                return $this;
        }

        public function getMessage()
        {
                return $this->message;
        }

        /**
         * Set the value of message
         *
         * @return  self
         */ 
        public function setMessage($message)
        {
                $this->message = $message;

                return $this;
        }

        public function getNbVote()
        {
                return $this->nbVote;
        }

        /**
         * Set the value of nbVote
         *
         * @return  self
         */ 
        public function setNbVote($nbVote)
        {
                $this->nbVote = $nbVote;

                return $this;
        }

        public function getDateCreation(){
                $formattedDate = $this->dateCreation->format("d/m/Y, H:i:s");
                return $formattedDate;
        }
    
        public function setDateCreation($date){
        $this->dateCreation = new \DateTime($date);
        return $this;
        }
    }