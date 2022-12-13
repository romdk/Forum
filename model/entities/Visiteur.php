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

        public function getId()
        {
                return $this->id;
        }


        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }


        public function getPseudonyme()
        {
                return $this->pseudonyme;
        }


        public function setPseudonyme($pseudonyme)
        {
                $this->pseudonyme = $pseudonyme;

                return $this;
        }


        public function getMotDePasse()
        {
                return $this->motDePasse;
        }


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


        public function getRole()
        {
                return $this->role;
        }


        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }


        public function getMail()
        {
                return $this->mail;
        }

        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        public function getStatut()
        {
                return $this->statut;
        }

        public function setStatut($statut)
        {
                $this->statut = $statut;

                return $this;
        }

        public function getImage(){
                return $this->image;
        }

        public function setImage($image){
                $this->image = $image;
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
