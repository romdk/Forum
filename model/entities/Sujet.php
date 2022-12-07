<?php
    namespace Model\Entities;

    use App\Entity;

    final class Sujet extends Entity{

        private $id;
        private $titre;
        private $visiteur;
        private $dateCreation;
        private $verrouille;

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
         * Get the value of titre
         */ 
        public function getTitre()
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

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

        public function getDateCreation(){
            $formattedDate = $this->dateCreation->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setDateCreation($date){
            $this->dateCreation = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of statut
         */ 
        public function getStatut()
        {
                return $this->statut;
        }

        /**
         * Set the value of statut
         *
         * @return  self
         */ 
        public function setStatut($statut)
        {
                $this->statut = $statut;

                return $this;
        }
    }
