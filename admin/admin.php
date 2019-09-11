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
                        <table class="container table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Référence</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Gestion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Méca</th>
                                    <td>#A001</td>
                                    <td>1</td>
                                    <td>Mécanique</td>
                                    <td>10€</td>
                                    <td>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Elec</th>
                                    <td>#B001</td>
                                    <td>1</td>
                                    <td>Electrique</td>
                                    <td>10€</td>
                                    <td>
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br><br><br>
                        <div class="container">
                            <h2 class=""><u><span class="righteous">Ajouter un article :</span></u></h2>
                            <form method="POST" action="recueil.php">
                                <div class="form-group">
                                    <label for="nom_article"><u> Référence article</u> :</label>
                                    <input type="text" class="form-control" id="nom_article" aria-describedby="ref" name="nom_article" placeholder="Ex : #A001">
                                </div>
                                <div class="form-group">
                                    <label for="description_article"><u> Description de l'article</u> :</label>
                                    <input type="text" class="form-control" id="description_article" aria-describedby="ref" name="description_article" placeholder="Ex : blablabla">
                                </div>
                                <div class="form-group">
                                    <label for="prix_article_HT"><u> Prix</u> :</label>
                                    <input type="number" class="form-control" id="prix_article_HT" aria-describedby="ref" name="prix_article_HT" placeholder="Ex : 10">
                                </div>
                                <div class="form-group">
                                    <label for="taux_tva"><u> Taux TVA</u> :</label>
                                    <input type="number" class="form-control" id="taux_tva" aria-describedby="ref" name="taux_tva" placeholder="Ex : 10">
                                </div>
                                

                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Êtes-vous sur ?</label>
                                    </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                        <br><br><br>
                        <div class="container">
                            <h2 class=""><u><span class="righteous">Afficher prix selon réference :</span></u></h2>
                            <form method="POST" action="showArticle.php">
                                <div class="form-group">
                                    <label for="nom_article"><u> Référence article</u> :</label>
                                    <input type="text" class="form-control" id="nom_article" aria-describedby="ref" name="nom_article" placeholder="Ex : #A001">
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                        <div class="container">
                        <h2 class=""><u><span class="righteous">Mise à jour du stock selon ville :</span></u></h2>
                        <form method="POST" action="showArticle.php">
                            <div class="form-group">
                                <label for="nom_ville"><u> Ville</u> :</label>
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