<?php

    require 'connect.php';

    // créer la variable connection 
    $db = connect("veloc");
    // TABLE ARTICLES 


    $db = connect("veloc");
    // TABLE ARTICLES 
    if(isset($_GET['idarticles'])){
        $idarticles = trim(htmlspecialchars($_GET['idarticles']));
    }else{
        $idarticles = null;
    }







    try{
        $req = $db->prepare("DELETE FROM articles WHERE idarticles = :idarticles");
        $req-> bindParam(":idarticles", $idarticles, PDO::PARAM_INT);

        
        $req->execute();
        

        // RENVOYER VERS CETTE PAGE :
        header('Location: confirm.php');
        
    } catch (Exception $e){
        echo $e->getMessage();
    }
?>