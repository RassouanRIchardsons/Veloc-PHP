<?php

    require 'connect.php';

    // créer la variable connection 
    $db = connect();
    // TABLE ARTICLES 
    if(isset($_POST["nom_article"])){
        $nom_article = trim(htmlspecialchars($_POST["nom_article"]));
    }else{
        $nom_article = null;
    }
    
    
    // // TABLE ARTICLES

    



    // TABLE ARCTICLES
    try{
        $req = $db->prepare("SELECT prix_article_HT, taux_tva FROM articles WHERE nom_article = :nom_article");
        $req-> bindParam(":nom_article", $nom_article, PDO::PARAM_STR);
        $req->execute();

        while($data = $req->fetchObject()){
            echo '<p>Prix de l\'article : '.$data->prix_article_HT.'<br>Taux de TVA : '.$data->taux_tva.'</p>';
        }
    // // TABLE ARTICLES        
    } catch (Exception $e){
        echo $e->getMessage();
    }
?>