<?php
session_start();
    require 'connect.php';
    // créer la variable connection 
    $db = connect("dbVeloc");

// var_dump($_POST);

if(isset($_POST['indexLille'])){
    $indexLille = $_POST['indexLille'];
}else{
    $indexLille = null;
}

echo $indexLille;

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


    // A FAIRE IMPORTANT : EVITER LES DOUBLONS D'UTILISATEURS

    // RECUEIL AJOUT UTILISATEUR
    if(isset($_POST['submitAjoutUtilisateur'])){
        // TABLE ARTICLES 
        if(isset($_POST["sexe_utilisateur"])){
            $sexe_utilisateur = trim(htmlspecialchars($_POST["sexe_utilisateur"]));
            if(isset($_POST["nom_utilisateur"])){
                $nom_utilisateur = trim(htmlspecialchars($_POST["nom_utilisateur"]));
                if(isset($_POST["prenom_utilisateur"])){
                    $prenom_utilisateur = trim(htmlspecialchars($_POST["prenom_utilisateur"]));
                    if(isset($_POST["adresse_mail_utilisateur"])){
                        $adresse_mail_utilisateur = trim(htmlspecialchars($_POST["adresse_mail_utilisateur"]));
                        if(isset($_POST["date_naissance_utilisateur"])){
                            $date_naissance_utilisateur = trim(htmlspecialchars($_POST["date_naissance_utilisateur"]));
                            if(isset($_POST["password_utilisateur"]) AND isset($_POST["password_utilisateur2"])){
                                if($_POST["password_utilisateur"] = $_POST["password_utilisateur2"]){
                                    $password_utilisateur = hash('sha256',$_POST['password_utilisateur']);

                                    $_SESSION['sexe_utilisateur'] = $sexe_utilisateur;
                                    $_SESSION['nom_utilisateur'] = $nom_utilisateur;
                                    $_SESSION['prenom_utilisateur'] = $prenom_utilisateur;
                                    $_SESSION['date_naissance_utilisateur'] = $date_naissance_utilisateur;
                                    $_SESSION['adresse_mail_utilisateur'] = $adresse_mail_utilisateur;
                                    $_SESSION['password_utilisateur'] = $password_utilisateur;


                                    header('Location: formulaire_supplementaire.php');
                                }
                            }else{
                                $password_utilisateur = null;
                            }
                        }else{
                            $date_naissance_utilisateur = null;
                        }
                    }else{
                        $adresse_mail_utilisateur = null;
                    }
                }else{
                    $prenom_utilisateur = null;
                }
            }else{
                $nom_utilisateur = null;
            }
        }else{
            $sexe_utilisateur = null;
        }
    }


    // RECUEIL FORMULAIRE SUPPLEMENTAIRE UTILISATEURS 
    if(isset($_POST['submitFormulaireSupplementaire'])){
        if(isset($_POST["villes_habitations"])){
            $villes_habitations = trim(htmlspecialchars($_POST["villes_habitations"]));
            if(isset($_POST["numero_habitations"])){
                $numero_habitations = strval(trim(htmlspecialchars($_POST["numero_habitations"])));
                if(isset($_POST["extension_habitations"])){
                    $extension_habitations = trim(htmlspecialchars($_POST["extension_habitations"]));
                    if(isset($_POST["rue_habitations"])){
                        $rue_habitations = trim(htmlspecialchars($_POST["rue_habitations"]));
                        if(isset($_POST["code_postal_habitations"])){
                            $code_postal_habitations = strval(trim(htmlspecialchars($_POST["code_postal_habitations"])));
                            if(isset($_POST["type_utilisateur"])){
                                $type_utilisateur = trim(htmlspecialchars($_POST["type_utilisateur"]));
                                if(isset($_POST["CB_number"])){
                                    $CB_number = intval(trim(htmlspecialchars($_POST["CB_number"])));
                                    if(isset($_POST["CB_name"])){
                                        $CB_name = trim(htmlspecialchars($_POST["CB_name"]));
                                        if(isset($_POST["CB_validate"])){
                                            $CB_validate = trim(htmlspecialchars($_POST["CB_validate"]));
                                        }else{
                                            $CB_validate = null;
                                        }
                                    }else{
                                        $CB_name = null;
                                    }
                                }else{
                                    $CB_number = null;
                                }
                            }else{
                                $type_utilisateur = null;
                            }
                        }else{
                            $code_postal_habitations = null;
                        }
                    }else{
                        $rue_habitations = null;
                    }
                }else{
                    $extension_habitations = null;
                }
            }else{
                $numero_habitations = null;
            }
        }else{
            $villes_habitations = null;
        }
        

        try{

            $sexe_utilisateur = $_SESSION['sexe_utilisateur'];
            $nom_utilisateur = $_SESSION['nom_utilisateur'];
            $prenom_utilisateur = $_SESSION['prenom_utilisateur'];
            $date_naissance_utilisateur = $_SESSION['date_naissance_utilisateur'];
            $adresse_mail_utilisateur = $_SESSION['adresse_mail_utilisateur'];
            $password_utilisateur = $_SESSION['password_utilisateur'];



                $req2 = $db->prepare("INSERT INTO utilisateurs (sexe_utilisateur, nom_utilisateur, prenom_utilisateur, date_naissance_utilisateur, adresse_mail_utilisateur, password_utilisateur, villes_habitations, extension_habitations, numero_habitations, code_postal_habitations, rue_habitations, type_utilisateur, CB_number, CB_name, CB_validate ) VALUES (:sexe_utilisateur, :nom_utilisateur, :prenom_utilisateur, :date_naissance_utilisateur, :adresse_mail_utilisateur, :password_utilisateur, :villes_habitations, :extension_habitations, :numero_habitations, :code_postal_habitations, :rue_habitations, :type_utilisateur, :CB_number, :CB_name, :CB_validate ) ");

                $req2-> bindParam(":sexe_utilisateur", $sexe_utilisateur, PDO::PARAM_STR);
                $req2-> bindParam(":nom_utilisateur", $nom_utilisateur, PDO::PARAM_STR);
                $req2-> bindParam(":prenom_utilisateur", $prenom_utilisateur, PDO::PARAM_STR);
                $req2-> bindParam(":date_naissance_utilisateur", $date_naissance_utilisateur, PDO::PARAM_STR);
                $req2-> bindParam(":adresse_mail_utilisateur", $adresse_mail_utilisateur, PDO::PARAM_STR);
                $req2-> bindParam(":password_utilisateur", $password_utilisateur, PDO::PARAM_STR);
                $req2-> bindParam(":villes_habitations", $villes_habitations, PDO::PARAM_STR);
                $req2-> bindParam(":extension_habitations", $extension_habitations, PDO::PARAM_STR);
                $req2-> bindParam(":numero_habitations", $numero_habitations, PDO::PARAM_STR);
                $req2-> bindParam(":code_postal_habitations", $code_postal_habitations, PDO::PARAM_STR);
                $req2-> bindParam(":rue_habitations", $rue_habitations, PDO::PARAM_STR);
                $req2-> bindParam(":type_utilisateur", $type_utilisateur, PDO::PARAM_STR);
                $req2-> bindParam(":CB_number", $CB_number, PDO::PARAM_INT);
                $req2-> bindParam(":CB_name", $CB_name, PDO::PARAM_STR);
                $req2-> bindParam(":CB_validate", $CB_validate, PDO::PARAM_STR);
                
                $req2-> execute();
                header('Location: confirmation_ajout_utilisateur.php');
                // echo "sexe_utilisateur ";
                // var_dump($sexe_utilisateur);
                // echo  "nom_utilisateur ";
                // var_dump($nom_utilisateur);
                // echo  "prenom_utilisateur ";
                // var_dump($prenom_utilisateur);
                // echo  "date_naissance_utilisateur ";
                // var_dump($date_naissance_utilisateur);
                // echo  "adresse_mail_utilisateur ";
                // var_dump($adresse_mail_utilisateur);
                // echo  "password_utilisateur ";
                // var_dump($password_utilisateur);
                // echo  "CB_name ";
                // var_dump($CB_name);
                // echo  "CB_validate ";
                // var_dump($CB_validate);
                // echo  "villes_habitations ";
                // var_dump($villes_habitations);
                // echo  "extension_habitations ";
                // var_dump($extension_habitations);
                // echo  "numero_habitations ";
                // var_dump($numero_habitations);
                // echo  "rue_habitations ";
                // var_dump($rue_habitations);
                // echo  "CB_number ";
                // var_dump($CB_number);
                // echo  "code_postal_habitations ";
                // var_dump($code_postal_habitations);
                // echo  "type_utilisateur ";
                // var_dump($type_utilisateur);
                // echo '<br><br><br><br>';

        }catch (Exception $e){
            echo $e->getMessage();
        }
    }

    // RECUEIL CONNEXION 
    $adresse_mail_utilisateur = isset($_POST['adresse_mail_utilisateur']) ? htmlspecialchars($_POST['adresse_mail_utilisateur']):null;
    $password_utilisateur = isset($_POST['password_utilisateur']) ? hash('sha256',$_POST['password_utilisateur']):null;
    if(isset($_POST['form_connexion'])){
		if(isset($adresse_mail_utilisateur) AND isset($password_utilisateur)){
			if(filter_var($adresse_mail_utilisateur, FILTER_VALIDATE_EMAIL)){
				// $req=$db->prepare("SELECT count(*) AND id_signit FROM signit WHERE adresse_mail_utilisateur = :adresse_mail_utilisateur AND password_utilisateur = :password_utilisateur ");
				$req3=$db->prepare("SELECT * FROM utilisateurs WHERE adresse_mail_utilisateur = :adresse_mail_utilisateur AND password_utilisateur = :password_utilisateur /*AND type_utilisateurs.Id_type_utilisateurs = signit.Id_type_user*/");
				// $req3=$db->prepare("SELECT * FROM signit WHERE adresse_mail_utilisateur = :adresse_mail_utilisateur AND password_utilisateur = :password_utilisateur ");
				$req3->bindParam(":adresse_mail_utilisateur", $adresse_mail_utilisateur,PDO::PARAM_STR);
				$req3->bindParam(":password_utilisateur", $password_utilisateur,PDO::PARAM_STR);
				$req3->execute();
                $infoUser=$req3->fetch();
                try{
                    if(!$infoUser){
                        echo "pb infoUser";
                        var_dump($_SESSION['nom_utilisateur']);
                        var_dump($_SESSION['password_utilisateur']);
                    }else{
                        echo "Session activée";
                        $_SESSION['nom_utilisateur'] = $infoUser['nom_utilisateur'];
                        $_SESSION['sexe_utilisateur'] = $infoUser['sexe_utilisateur'];
                        // var_dump($_SESSION['sexe_utilisateur']);
                        header('Location: ../indexx.php');
                    }
                }catch (Exception $e){
                    echo $e->getMessage();
                }				
			}else{
				$erreur = "Votre adresse mail n'est pas valide";
			}
		}else{
			$erreur = "Tous les champs ne sont pas remplis !!!";
		}
    }
    

?>