<?php

    require 'connect.php';

    // créer la variable connection 
    $db = connect("dbVeloc");
    // TABLE ARTICLES 
    if(isset($_GET['idarticles'])){
        $idarticles = trim(htmlspecialchars($_GET['idarticles']));
    }else{
        $idarticles = null;
    }
?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<title>MODIF VELOC</title>
</head>

<body>
    <div class="container ">
    <h2>PAGE MODIFICATION</h2>
<?php
    try{
        $req = $db->prepare("SELECT * FROM articles WHERE idarticles = :idarticles");
        $req-> bindParam(":idarticles", $idarticles, PDO::PARAM_INT);
        $req->execute();
        while($data = $req->fetchObject()){
        

        echo'
        <form class="mt-4 p-2" action="modifArticlesConfirm.php?idarticles='.$idarticles.'" method="POST">
            <div class="form-group">
                <label for="nom_article"><b> Nom du produit</b> :</label>
                <input type="text" class="form-control" id="nom_article" aria-describedby="ref" value="'.$data->nom_article.'" name="nom_article">
            </div>
            <div class="form-group">
                <label for="description_article"><b> Description du produit</b> :</label>
                <input type="text" class="form-control" id="description_article" aria-describedby="ref" name="description_article" value="'.$data->description_article.'">
            </div>
            <div class="form-group">
                <label for="prix_article_HT"><b> Prix</b> :</label>
                <input type="number" class="form-control" id="prix_article_HT" aria-describedby="ref" name="prix_article_HT" value="'.$data->prix_article_HT.'">
            </div>
            <div class="form-group">
                <label for="taux_tva"><b> Prix</b> :</label>
                <input type="number" class="form-control" id="taux_tva" aria-describedby="ref" name="taux_tva" value="'.$data->taux_tva.'">
            </div>
            <div class="form-group">
                <label for="type_article"><b> Catégorie</b> :</label>
                <input type="text" class="form-control" id="type_article" aria-describedby="ref" name="type_article" value="'.$data->type_article.'">
                <small>0 : Mécanique --- 1 : Électrique</small>
            </div>
            
            <button type="submit" class="btn btn-primary"> Confirmer modification</button>
            <a href="admin.php"><button class="btn btn-primary" type="button"> Retour</button></a>
        </form>';
            }
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>
        
    </div>