<?php
    require 'connect.php';
    $db = connect("dbVeloc");



// VERIFICATIONS
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
// FIN VERIFICATIONS
?>





<!doctype html>
    <html lang="fr">
        <head>
    <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Lien Bootstrap -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Lien logo -->
            <script src="https://kit.fontawesome.com/a9c9c86a63.js"></script>
    <!-- Lien Favicon
            <link rel="icon" type="image/png" href="favicon.png" /> -->
    <!-- Lien Google font -->
            <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <!-- Lien CSS -->
            <link rel="stylesheet" href="../assets/style.css"/>
            <title>ADMIN</title>
        </head>


        <body>
            <div id="contenu_principal">

<!-- HEADER -->
                <header class="border-bottom bg-light fixed-top roboto">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand d-flex" href="#">
                            <i class="fas fa-biking fa-3x"></i>
                            <h1><span class="righteous">Véloc.</span></h1>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Page ADMIN</a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="" class="pr-1" data-toggle="modal" data-target="#modalSignIn">S'identifier </a>
                    </div>
                </header>
<!-- // HEADER -->
<!-- SECTION -->
                <section class="roboto">
<!-- HOME -->                    
                    <div class="" id="home">                  
                        <h1 class="mb-4">
                            <a class="navbar-brand d-flex justify-content-center text-dark text-center text-wrap" href="#">
                                <i class="fas fa-biking fa-4x mr-1"></i>
                                <h2 class="display-4"><u><span class="righteous">Véloc.</span></u> ADMIN</h2>
                            </a>
                        </h1>
                        <br>







<!-- AFFICHAGE TABLEAU PRODUITS -->
<?php
    try{
        $req = $db->prepare("SELECT * FROM articles ");
        $req-> bindParam(":idarticles", $idarticles, PDO::PARAM_INT);
        $req-> bindParam(":nom_article", $nom_article, PDO::PARAM_STR);
        $req-> bindParam(":description_article", $description_article, PDO::PARAM_STR);
        $req-> bindParam(":type_article", $type_article, PDO::PARAM_INT);
        $req-> bindParam(":taux_tva", $taux_tva, PDO::PARAM_INT);
        $req-> bindParam(":prix_article_HT", $prix_article_HT, PDO::PARAM_INT);
        $req->execute();
// LE CODE CI DESSUS PERMET DE "CHARGER" OU DE "PREPARER" CE QUE L'ON CHERCHE A AFFICHER
?>
                        <table class="container table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Fonctionnement</th>
                                    <th scope="col">Nom du vélo</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Taux TVA</th>
                                    <th scope="col">Prix HT</th>
                                    <th scope="col">Gestion</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
        while($data = $req->fetchObject()){
            if($data->type_article == 0){
                $data->type_article = "Mécanique";
            }elseif($data->type_article == 1){
                $data->type_article = "Électrique";
            }else{
                $data->type_article = "Inconnu";
            }
?>
                                <tr>
                                    <th scope="row"><?php echo $data->idarticles; ?></th>
                                    <td><?php echo $data->type_article; ?></td>
                                    <td><?php echo $data->nom_article; ?></td>
                                    <td><?php echo $data->description_article; ?></td>
                                    <td><?php echo $data->taux_tva; ?></td>
                                    <td><?php echo $data->prix_article_HT; ?> €</td>
                                    <td>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownGestion" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownGestion">
                                            <a href="modifArticles.php?idarticles=<?php echo $data->idarticles; ?>"><button class="btn btn-danger dropdown-item" type="submit">Modifier</button></a>
                                            <button class="btn btn-danger dropdown-item" data-toggle="modal" data-id="<?php echo $data->idarticles; ?>" data-target="#exampleModalCenter<?php echo $data->idarticles;  ?>" type="button">Supprimer</button>
                                        </div>
                                    </td>
                                </tr>
<!-- MODAL CONFIRMATION SUUPPRESSION -->
        <div class="modal fade" id="exampleModalCenter<?php echo $data->idarticles; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmer la suppression ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="supprimerArticles.php?idarticles=<?php echo $idarticles; ?>"><button type="button" class="btn btn-primary"> Confirmer</button></a>
                        
                    </div>        
                </div>
            </div>
        </div>
<!-- // MODAL CONFIRMATION SUUPPRESSION -->
<?php
        }
    }catch (Exception $e){
        echo $e->getMessage();
    }
?>
<!-- FIN AFFICHAGE TABLEAU PRODUIT -->


<!-- FORMULAIRE D'AJOUT D'ARTICLE -->
                            </tbody>
                        </table>
                        <br><br><br>
                        <div class="container">
                            <h2 class=""><u><span class="righteous">Ajouter un article</u> :</span></h2>
                            <form method="POST" action="recueil.php">
                                <div class="form-group">
                                    <label for="nom_article"> Référence article :</label>
                                    <input type="text" class="form-control" id="nom_article" aria-describedby="ref" name="nom_article" placeholder="Ex : #A001">
                                </div>
                                <div class="form-group">
                                    <label for="description_article"> Description de l'article :</label>
                                    <input type="text" class="form-control" id="description_article" aria-describedby="ref" name="description_article" placeholder="Ex : blablabla">
                                </div>
                                <div class="form-group">
                                    <label for="prix_article_HT"> Prix :</label>
                                    <input type="number" class="form-control" id="prix_article_HT" aria-describedby="ref" name="prix_article_HT" placeholder="Ex : 10">
                                </div>
                                <div class="form-group">
                                    <label for="taux_tva"> Taux de TVA :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="taux_tva" id="taux_tva1" value="5" checked>
                                        <label class="form-check-label" for="taux_tva1">5 %</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="taux_tva" id="taux_tva2" value="10">
                                        <label class="form-check-label" for="taux_tva2">10 %</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type_article"> Type de vélo :</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_article" id="type_article1" value="0" checked>
                                        <label class="form-check-label" for="type_article1">Mécanique</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="type_article" id="type_article2" value="1">
                                        <label class="form-check-label" for="type_article2">Électrique</label>
                                    </div>
                                </div>
                                <button name="submitAjoutArticle" type="submit" class="btn btn-primary">Ajouter le produit</button>
                            </form>
                        </div>
<!-- FIN DE FORMULAIRE D'AJOUT D'ARTICLE -->



                        <br><br><br>
                        <div class="container">
                            <h2 class=""><u><span class="righteous">Afficher prix selon réference</u> :</span></h2>
                            <form method="POST" action="showArticle.php">
                                <div class="form-group">
                                    <label for="nom_article"> Référence article :</label>
                                    <input type="text" class="form-control" id="nom_article" aria-describedby="ref" name="nom_article" placeholder="Ex : #A001">
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                        <div class="container">
                        <h2 class=""><u><span class="righteous">Mise à jour du stock selon ville</u> :</span></h2>
                        <form method="POST" action="showArticle.php">
                            <div class="form-group">
                                <label for="nom_ville"> Ville :</label>
                                <input type="radio" id="nom_ville" aria-describedby="ref" name="nom_ville" value="Paris">
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                        </div>


                    </div>
<!-- //HOME -->




<!-- MODAL -->
    <!-- MODAL SIGN IN -->
                <div class="modal fade" id="modalSignIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="card bg-light">
                                    <article class="card-body mx-auto" style="max-width: 400px;">
                                        <h4 class="card-title mt-3 text-center righteous"><i class="fas fa-biking fa-2x mr-1" aria-hidden="true"></i>Se connecter</h4>
                                        <br>
                                        <p>
                                            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter mr-2"></i>Se connecter via Twitter</a>
                                            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f mr-2"></i>Se connecter via facebook</a>
                                        </p>
                                        <p class="divider-text">
                                            <span class="bg-light">OU</span>
                                        </p>
                                        <form method="POST" action="#.php">
                                            <!-- E-MAIL -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                </div>
                                                <input name="adresse_mail_utilisateur" class="form-control" placeholder="Adresse mail" type="email">
                                            </div> 
                                            <!-- PASSWORD -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input name="password_utilisateur" class="form-control" placeholder="Mot de passe" type="password">
                                            </div> 
                                            <!-- SUBMIT -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                                            </div>       
                                            <p class="text-center">Pas encore de compte?<a href="" class="pl-1" data-toggle="modal" data-target="#modalSignUp" data-dismiss="modal">Sign up</a></p>                                                                 
                                        </form>
                                    </article>
                                </div> 
                            
                            </div>
                        </div>
                    </div>
                </div>
    <!-- // MODAL SIGN IN -->
<!-- // MODAL -->
            </div>


<!-- /////////////// -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>