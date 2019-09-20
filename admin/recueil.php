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

            // header('Location: confirm.php');
            
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }






    // RECUEIL AJOUT UTILISATEUR
    if(isset($_POST['submitAjoutUtilisateur'])){
        // TABLE ARTICLES 
        if(isset($_POST["sexe_utilisateur"])){
            $sexe_utilisateur = trim(htmlspecialchars($_POST["sexe_utilisateur"]));
        }else{
            $sexe_utilisateur = null;
        }
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
        if(isset($_POST["date_naissance_utilisateur"])){
            $date_naissance_utilisateur = trim(htmlspecialchars($_POST["date_naissance_utilisateur"]));
        }else{
            $date_naissance_utilisateur = null;
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
                $req = $db->prepare(" INSERT INTO utilisateurs (sexe_utilisateur, nom_utilisateur, prenom_utilisateur, date_naissance_utilisateur, adresse_mail_utilisateur, password_utilisateur, date_creation_utilisateurs) VALUES (:sexe_utilisateur, :nom_utilisateur, :prenom_utilisateur, :date_naissance_utilisateur, :adresse_mail_utilisateur, :password_utilisateur, NOW() ) ");
                $req-> bindParam(":sexe_utilisateur", $sexe_utilisateur, PDO::PARAM_STR);
                $req-> bindParam(":nom_utilisateur", $nom_utilisateur, PDO::PARAM_STR);
                $req-> bindParam(":prenom_utilisateur", $prenom_utilisateur, PDO::PARAM_STR);
                $req-> bindParam(":date_naissance_utilisateur", $date_naissance_utilisateur, PDO::PARAM_STR);
                $req-> bindParam(":adresse_mail_utilisateur", $adresse_mail_utilisateur, PDO::PARAM_STR);
                $req-> bindParam(":password_utilisateur", $password_utilisateur, PDO::PARAM_STR);
                
            // // TABLE USER
                $req-> execute();
                // header('formulaire_supplementaire.php');
                echo 'cool';
                // A EFFECTUER : CREER UNE PAGE PHP COMPRENNANT UN FOMULAIRE QUI AIDERA A REMPLIR LE RESTE DES INFORMATIONS CONCERANT L'UTILISATEUR.


        }catch (Exception $e){
            echo $e->getMessage();
        }
    }


    //RECUEIL FORMULAIRE SUPPLEMENTAIRE UTILISATEURS 
    if(isset($_POST['submitFormulaireSupplementaire'])){
        // TABLE ARTICLES 
        if(isset($_POST["villes_habitations"])){
            $villes_habitations = trim(htmlspecialchars($_POST["villes_habitations"]));
        }else{
            $villes_habitations = null;
        }
        if(isset($_POST["numero_habitations"])){
            $numero_habitations = trim(htmlspecialchars($_POST["numero_habitations"]));
        }else{
            $numero_habitations = null;
        }
        if(isset($_POST["extension_habitations"])){
            $extension_habitations = trim(htmlspecialchars($_POST["extension_habitations"]));
        }else{
            $extension_habitations = null;
        }
        if(isset($_POST["rue_habitations"])){
            $rue_habitations = trim(htmlspecialchars($_POST["rue_habitations"]));
        }else{
            $rue_habitations = null;
        }
        if(isset($_POST["type_utilisateur"])){
            $type_utilisateur = trim(htmlspecialchars($_POST["type_utilisateur"]));
        }else{
            $type_utilisateur = null;
        }
        if(isset($_POST["CB_number"])){
            $CB_number = trim(htmlspecialchars($_POST["CB_number"]));
        }else{
            $CB_number = null;
        }
        if(isset($_POST["CB_name"])){
            $CB_name = trim(htmlspecialchars($_POST["CB_name"]));
        }else{
            $CB_name = null;
        }
        if(isset($_POST["CB_validdate"])){
            $CB_validdate = trim(htmlspecialchars($_POST["CB_validdate"]));
        }else{
            $CB_validdate = null;
        }

        try{
            // TABLE USER

                //ajout table adresse
                $req = $db->prepare("INSERT INTO adresses_utilisateurs (villes_habitations, extension_habitations, numero_habitations, rue_habitations) VALUES (:villes_habitations, :extension_habitations, :numero_habitations, :rue_habitations) ");

                //ajour table CB
                $req = $db->prepare("INSERT INTO cb (CB_number, CB_name, CB_validdate) VALUES (:CB_number, :CB_name, :CB_validdate) ");

                //ajout table utilisateur
                $req = $db->prepare("INSERT INTO utilisateurs (type_utilisateur) VALUES (:type_utilisateur) ");
                
                $req-> bindParam(":villes_habitations", $villes_habitations, PDO::PARAM_STR);
                $req-> bindParam(":extension_habitations", $extension_habitations, PDO::PARAM_STR);
                $req-> bindParam(":numero_habitations", $numero_habitations, PDO::PARAM_STR);
                $req-> bindParam(":rue_habitations", $rue_habitations, PDO::PARAM_STR);
                $req-> bindParam(":type_utilisateur", $type_utilisateur, PDO::PARAM_STR);
                $req-> bindParam(":CB_number", $CB_number, PDO::PARAM_INT);
                $req-> bindParam(":CB_name", $CB_name, PDO::PARAM_STR);
                $req-> bindParam(":CB_validdate", $CB_validdate, PDO::PARAM_STR);

                $req-> execute();

                var_dump($villes_habitations);
                var_dump($numero_habitations);
                var_dump($extension_habitations);
                var_dump($rue_habitations);
                var_dump($type_utilisateur);
                var_dump($CB_number);
                var_dump($CB_name);
                var_dump($CB_validdate);
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
?>