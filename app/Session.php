<?php
    namespace App;

    class Session{

        private static $categories = ['error', 'success'];

        /**
        *   ajoute un message en session, dans la catégorie $categ
        */
        public static function addFlash($categ, $msg){
            $_SESSION[$categ] = $msg;
        }

        /**
        *   renvoie un message de la catégorie $categ, s'il y en a !
        */
        public static function getFlash($categ){
            
            if(isset($_SESSION[$categ])){
                $msg = $_SESSION[$categ];  
                unset($_SESSION[$categ]);
            }
            else $msg = "";
            
            return $msg;
        }

        /**
        *   met un user dans la session (pour le maintenir connecté)
        */
        public static function setVisiteur($visiteur){
            $_SESSION["visiteur"] = $visiteur;
        }

        public static function getVisiteur(){
            return (isset($_SESSION['visiteur'])) ? $_SESSION['visiteur'] : false;
        }

        public static function unsetVisiteur(){
            unset($_SESSION["visiteur"]);
        }

        public static function isAdmin(){
            if(self::getVisiteur() && self::getVisiteur()->hasRole("Admin")){
                return true;
            }
            return false;
        }

    }