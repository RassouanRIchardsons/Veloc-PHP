<?php

    require 'connect.php';
    // créer la variable connection 
    $db = connect("veloc");



    // RECCEUIL AJOUT ARTICLE 
    if(isset($_POST['submitAjoutArticle'])){
        // TABLE ARTICLES 
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
        if(isset($_POST["prix_article_HT"])){
            $prix_article_HT = trim(htmlspecialchars($_POST["prix_article_HT"]));
        }else{
            $prix_article_HT = null;
        }
        if(isset($_POST["taux_tva"])){
            $taux_tva = trim(htmlspecialchars($_POST["taux_tva"]));
        }else{
            $taux_tva = null;
        }
        if(isset($_POST["type_article"])){
            $type_article = trim(htmlspecialchars($_POST["type_article"]));
        }else{
            $type_article = null;
        }
        // // TABLE ARTICLES

        // var_dump($nom_article.$description_article.$prix_article_HT.$taux_tva);


        try{
        // TABLE ARTICLES
            $req = $db->prepare(" INSERT INTO articles (nom_article, description_article, prix_article_HT, taux_tva, type_article) VALUES (:nom_article, :description_article, :prix_article_HT, :taux_tva, :type_article) ");
            $req-> bindParam(":type_article", $type_article, PDO::PARAM_STR);
            $req-> bindParam(":nom_article", $nom_article, PDO::PARAM_STR);
            $req-> bindParam(":description_article", $description_article, PDO::PARAM_STR);
            $req-> bindParam(":prix_article_HT", $prix_article_HT, PDO::PARAM_INT);
            $req-> bindParam(":taux_tva", $taux_tva, PDO::PARAM_INT);
        // // TABLE ARTICLES




            $req-> execute();

            header('Location: confirm.php');
            
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    // RECUEIL AJOUT UTILISATEUR
    if(isset($_POST['submitAjoutUtilisateur']))
        // TABLE ARTICLES 
        if(isset($_POST["nom_utilisateur"])){
            $nom_utilisateur = trim(htmlspecialchars($_POST["nom_utilisateur"]));
        }else{
            $nom_utilisateur = null;
        }
        if(isset($_POST["prenom_utilisateur"])){
            $prenom_utilisateur = trim(htmlspecialchars($_POST["prenom_utilisateur"]));
        }else{
            $prenom_utilisateur = null;
        }
        if(isset($_POST["adresse_mail_utilisateur"])){
            $adresse_mail_utilisateur = trim(htmlspecialchars($_POST["adresse_mail_utilisateur"]));
        }else{
            $adresse_mail_utilisateur = null;
        }
        if(isset($_POST["date_naissance_utlilisateur"])){
            $date_naissance_utlilisateur = trim(htmlspecialchars($_POST["date_naissance_utlilisateur"]));
        }else{
            $date_naissance_utlilisateur = null;
        }
        if(isset($_POST["password_utilisateur"]) AND isset($_POST["password_utilisateur2"])){
            if($_POST["password_utilisateur"] = $_POST["password_utilisateur2"]){
                $password_utilisateur = hash('sha256',$_POST['password_utilisateur']);
            }
        }else{
            $password_utilisateur = null;
        }

        try{
            // TABLE USER
                $req = $db->prepare(" INSERT INTO articles (nom_article, description_article, prix_article_HT, taux_tva, type_article) VALUES (:nom_article, :description_article, :prix_article_HT, :taux_tva, :type_article) ");
                $req-> bindParam(":type_article", $type_article, PDO::PARAM_STR);
                $req-> bindParam(":nom_article", $nom_article, PDO::PARAM_STR);
                $req-> bindParam(":description_article", $description_article, PDO::PARAM_STR);
                $req-> bindParam(":prix_article_HT", $prix_article_HT, PDO::PARAM_INT);
                $req-> bindParam(":taux_tva", $taux_tva, PDO::PARAM_INT);
            // // TABLE USER
    
    
    
    
                $req-> execute();
    
                header('Location: confirm.php');
                
            }catch (Exception $e){
                echo $e->getMessage();
            }
?>