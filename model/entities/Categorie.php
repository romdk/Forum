<?php
    namespace Model\Entities;

    use App\Entity;

    final class Categorie extends Entity{

        // attributs
        private $id;
        private $titre;

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
         * Get the value of nomCategorie
         */ 
        public function getNomCategorie()
        {
                return $this->nomCategorie;
        }

        /**
         * Set the value of nomCategorie
         *
         * @return  self
         */ 
        public function setNomCategorie($nomCategorie)
        {
                $this->nomCategorie = $nomCategorie;

                return $this;
        }
    }
