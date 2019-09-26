<?php

    require 'connect.php';

    $db = connect("dbVeloc");


    if(isset($_GET["idarticles"])){
        $idarticles = trim(htmlspecialchars($_GET["idarticles"]));
    }else{
        $idarticles = null;
    }
    if(isset($_POST["nom_article"])){
        $nom_article = trim(htmlspecialchars($_POST["nom_article"]));
    }else{
        $nom_article = null;
    }
    if(isset($_POST["description_article"])){
        $description_article = trim(htmlspecialchars($_POST["description_article"]));
    }else{
        $description_article = null;
    }
    if(isset($_POST["type_article"])){
        $type_article = trim(htmlspecialchars($_POST["type_article"]));
    }else{
        $type_article = null;
    }
    if(isset($_POST["taux_tva"])){
        $taux_tva = trim(htmlspecialchars($_POST["taux_tva"]));
    }else{
        $taux_tva = null;
    }
    if(isset($_POST["prix_article_HT"])){
        $prix_article_HT = trim(htmlspecialchars($_POST["prix_article_HT"]));
    }else{
        $prix_article_HT = null;
    }



            $req = $db->prepare("UPDATE articles SET nom_article = :nom_article , description_article = :description_article, type_article = :type_article, taux_tva = :taux_tva, prix_article_HT = :prix_article_HT WHERE idarticles = :idarticles");
            $req-> bindParam(":idarticles", $idarticles, PDO::PARAM_INT);
            $req-> bindParam(":nom_article", $nom_article, PDO::PARAM_STR);
            $req-> bindParam(":description_article", $description_article, PDO::PARAM_STR);
            $req-> bindParam(":type_article", $type_article, PDO::PARAM_INT);
            $req-> bindParam(":taux_tva", $taux_tva, PDO::PARAM_INT);
            $req-> bindParam(":prix_article_HT", $prix_article_HT, PDO::PARAM_INT);
            $req->execute();

            // var_dump($idarticles);
            header('Location: confirm.php');

?>