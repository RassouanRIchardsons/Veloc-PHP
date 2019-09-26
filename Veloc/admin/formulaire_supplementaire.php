<?php
session_start();
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
            <title>Formulaire d'inscription Veloc</title>
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
                                    <a class="nav-link" href="#">Page d'accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#ville">Trouvez sa borne</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#caracteristiques">Nos vélos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#footer">Contact et Info</a>
                                </li>
                            </ul>
                        </div>
                        <a href="" data-toggle="modal" data-target="#modalReserver">PayPal</a>
                    </nav>

                    <div class="col-12 d-flex justify-content-end">
                        <a href="" class="pr-1" data-toggle="modal" data-target="#modalSignIn">S'identifier </a>
                        /
                        <a href="" class="pl-1" data-toggle="modal" data-target="#modalSignUp">  Créer un compte</a>
                    </div>
                </header>
<!-- // HEADER -->

<!-- SECTION -->
                <section class="roboto">
<!-- HOME -->                    
                    <div class="" id="home">
                    <div class="modal-content">
                            
                                <div class="card bg-light">
                                    <article class="card-body mx-auto" style="max-width: 500px;">
                                        <h4 class="card-title mt-3 text-center righteous"><i class="fas fa-biking fa-2x mr-1" aria-hidden="true"></i>Information supplémentaires</h4>
                                        <br>
                                        <form method="POST" action="recueil.php">
                                        
                                        <!-- ADRESSE -->
                                        <h5 class="card-title mt-3 text-center righteous"><i class="fas fa-biking fa-2x mr-1" aria-hidden="true"></i>ADRESSE</h5>
                                            <!-- numero_habitations -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-id-card" aria-hidden="true"></i></span>
                                                </div>
                                                <input name="numero_habitations" class="form-control" placeholder="Numéro d'habitation *" pattern="[0-9]{0,4}" type="text">
                                            </div>
                                            <!-- extension_habitations  -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                </div>
                                                <input name="extension_habitations" class="form-control" placeholder="Extension" type="text">
                                            </div>
                                            <!-- rue_habitations -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                </div>
                                                <input name="rue_habitations" class="form-control" placeholder="Rue *" type="text">
                                            </div> 
                                            <!-- code_postal_habitations -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-id-card" aria-hidden="true"></i></span>
                                                </div>
                                                <input name="code_postal_habitations" class="form-control" placeholder="Code Postal *" pattern="[0-9]{5}" type="text">
                                            </div>

                                            <!-- villes_habitations -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-id-card-o" aria-hidden="true"></i> </span>
                                                </div>
                                                <input name="villes_habitations" class="form-control" placeholder="Ville *" type="text">
                                            </div>
                                            
                                            <!-- type_utilisateur -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-male" aria-hidden="true"></i> </span>
                                                </div>
                                                <select name="type_utilisateur" class="form-control">
                                                    <option value="part">Particulier</option>
                                                    <option value="pro">Professionel</option>    
                                                </select>
                                            </div>
                                            
                                            <br>
                                        <!-- CARTE BLEUE -->
                                            <h5 class="card-title mt-3 text-center righteous"><i class="fas fa-biking fa-2x mr-1" aria-hidden="true"></i>CARTE BANCAIRE</h5>
                                            <!-- CB_number -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input name="CB_number" class="form-control" placeholder="Numéro de CB *" type="text" pattern="[0-9]{0,16}"><!-- PATTERN A CHANGER APRES VERIFICATION  -->
                                            </div> 
                                            <!-- CB_name -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input name="CB_name" class="form-control" placeholder="Nom du titulaire de la carte *" type="text">
                                            </div>
                                            <!-- CB_validate -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input name="CB_validate" class="form-control" placeholder="Date de valitidé de la carte" type="date">
                                            </div>
                                            <!-- SUBMIT -->
                                            <div class="form-group">
                                                <button name="submitFormulaireSupplementaire" type="submit" class="btn btn-primary btn-block">Créer son compte</button>
                                            </div>                                    
                                        </form>
                                    </article>
                                </div> 
                            
                            
                        </div>
                    </div>
                </section>



<!-- MODAL -->
    <!-- SIGNUP -->
                <div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            
                                <div class="card bg-light">
                                    <article class="card-body mx-auto" style="max-width: 400px;">
                                        <h4 class="card-title mt-3 text-center righteous"><i class="fas fa-biking fa-2x mr-1" aria-hidden="true"></i>Créer un compte</h4>
                                        <br>
                                        <p>
                                            <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter mr-2"></i>Se connecter via Twitter</a>
                                            <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f mr-2"></i>Se connecter via facebook</a>
                                        </p>
                                        <p class="divider-text">
                                            <span class="bg-light">OU</span>
                                        </p>
                                        <form method="POST" action="admin/recueil.php">
                                            <!-- NOM -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-id-card-o" aria-hidden="true"></i> </span>
                                                </div>
                                                <input name="nom_utilisateur" class="form-control" placeholder="Nom" type="text">
                                            </div>
                                            <!-- PRENOM -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-id-card" aria-hidden="true"></i></span>
                                                </div>
                                                <input name="prenom_utilisateur" class="form-control" placeholder="Prénom" type="text">
                                            </div>
                                            <!-- E-MAIL -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                </div>
                                                <input name="adresse_mail_utilisateur" class="form-control" placeholder="Adresse mail" type="email">
                                            </div> 
                                            <!-- DATE DE NAISSANCE -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-birthday-cake"></i> </span>
                                                </div>
                                                <input name="date_naissance_utilisateur" class="form-control" placeholder="Date de naissance" value="Date de naissance" type="date">
                                            </div>
                                            <!-- PASSWORD -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input name="password_utilisateur" class="form-control" placeholder="Mot de passe" type="password">
                                            </div> 
                                            <!-- REPETER PASSWORD -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input name="password_utilisateur2" class="form-control" placeholder="Répeter votre mot de passe" type="password">
                                            </div>
                                            <!-- SUBMIT -->
                                            <div class="form-group">
                                                <button name="submitAjoutUtilisateur" type="submit" class="btn btn-primary btn-block">Créer son compte</button>
                                            </div>       
                                            <p class="text-center">Déjà membre? <a href="" data-toggle="modal" data-target="#modalSignIn" data-dismiss="modal">Log In</a> </p>                                                                 
                                        </form>
                                    </article>
                                </div> <!-- card.// -->
                            
                            
                        </div>
                    </div>
                </div>
    <!-- // MODAL SIGN UP -->
    
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