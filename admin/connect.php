<?php
    function connect(){
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=veloc;charset=utf8','root','');
            return $db;
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

?>