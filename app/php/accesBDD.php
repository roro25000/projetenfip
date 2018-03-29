<?php

Class AccesBDD {
    static $DB;
    static function connectBDD() {
        try {
            $DB = new PDO("pgsql:host=10.189.251.9;dbname=scp6", "scp6", "scp6");
        } catch (Exception $e) {
            die("erreur : " . $e->getMessage());
        }
        return $DB;
    }
    
    function closeBDD(){
            $DB = null;
    }
}
