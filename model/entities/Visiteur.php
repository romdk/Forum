<?php
    namespace Model\Entities;

    use App\Entity;
    use App\Session;

    final class Visiteur extends Entity{

        private $id;
        private $pseudonyme;
        private $motDePasse;
        private $dateInscription;
        private $role;
        private $mail;

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
         * Get the value of pseudonyme
         */ 
        public function getPseudonyme()
        {
                return $this->pseudonyme;
        }

        /**
         * Set the value of pseudonyme
         *
         * @return  self
         */ 
        public function setPseudonyme($pseudonyme)
        {
                $this->pseudonyme = $pseudonyme;

                return $this;
        }

        /**
         * Get the value of motDePasse
         */ 
        public function getMotDePasse()
        {
                return $this->motDePasse;
        }

        /**
         * Set the value of motDePasse
         *
         * @return  self
         */ 
        public function setMotDePasse($motDePasse)
        {
                $this->motDePasse = $motDePasse;

                return $this;
        }

        public function getDateInscription(){
            $formattedDate = $this->dateInscription->format("d/m/Y, H:i:s");
            return $formattedDate;
        }

        public function setDateInscription($date){
            $this->dateInscription = new \DateTime($date);
            return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        public function __toString() {
                return $this->pseudonyme;
        }

        public function hasRole($role){
                if(Session::getVisiteur()->getRole() == $role){
                        return true;
                }
        }
    }
