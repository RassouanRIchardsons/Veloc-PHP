<?php
// session_start();
require 'admin/recueil.php';
$db = connect("dbVeloc");

if(isset($_POST['contactez_nous'])){
    if(isset($_POST["nom_contact"])){
        $nom_contact = trim(htmlspecialchars($_POST["nom_contact"]));
        if(isset($_POST['email_contact'])){
            if(filter_var($email_contact, FILTER_VALIDATE_EMAIL)){
                $email_contact = trim(htmlspecialchars($_POST["email_contact"]));
                if(isset($_POST['message_contact'])){
                    $message_contact = trim(htmlspecialchars($_POST["message_contact"]));

                    $insererMessageContact = $db->prepare("INSERT INTO contactez_nous (nom_contact, email_contact, message_contact) VALUE (:nom_contact, :email_contact, :message_contact");
					$insererMessageContact->bindParam(":nom_contact", $nom_contact, PDO::PARAM_STR);
					$insererMessageContact->bindParam(":email_contact", $email_contact, PDO::PARAM_STR);
					$insererMessageContact->bindParam(":message_contact", $message_contact, PDO::PARAM_STR);
					$insererMessageContact->execute();
                }
                
            }
        }
    }
}

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
            <link rel="stylesheet" href="assets/style.css"/>
            <title>Véloc, location de vélo en 2"2'</title>
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
                                    <a class="nav-link righteous" href="#contenu_principal">Page d'accueil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link righteous" href="#ville">Trouvez sa borne</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link righteous" href="#caracteristiques">Nos vélos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link righteous" href="#footer">Contact et Info</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-3 d-flex justify-content-end">
                            <?php if(isset($_SESSION['nom_utilisateur'])){
                                echo "<p class='pt-3 pr-4'>Bonjour <b>".$_SESSION['nom_utilisateur']."</b></p>";
                                echo "<a class='pt-3' href='admin/logout.php'><u>Déconnexion ?</u></a>";
                                
                                }else{
                                    echo "<a href='' class='' data-toggle='modal' data-target='#modalSignIn'>S'identifier </a>
                                    <span class='px-2'>/</span>
                                    <a href='' class='' data-toggle='modal' data-target='#modalSignUp'>  Créer un compte</a>";
                                }
                            ?>
                        </div>
                        <!-- <a href="" data-toggle="modal" data-target="#modalReserver">PayPal</a> -->
                    </nav>
                </header>
<!-- // HEADER -->
<!-- SECTION -->
                <section class="roboto">
<!-- HOME -->                    
                    <div class="" id="home">               
                            <h1>
                                <a class="navbar-brand d-flex justify-content-center text-dark text-center mx-auto text-wrap" href="#">
                                    <i class="fas fa-biking fa-4x mr-1 d-none d-sm-block"></i>
                                    <h2 class="display-4"><u><span class="righteous">Véloc.</span></u> la location de vélo en 2"2'</h2>
                                </a>
                            </h1>
        <!-- CAROUSEL-->
                        <div class="bd-example d-flex justify-content-center">
                            <div id="carouselExampleCaptions" class="carousel slide shadow_perso" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/img/img-velib-bleu.jpeg" class="d-block mx-auto img-fluid shadow_perso" alt="...">
                                        <div class="carousel-caption d-none d-sm-block">
                                            <h5 class="ovf display-4"><u class="h5_carousel h5_carousel_bleu righteous">Le vélo électrique</u></h5>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/img/img-velib-vert.jpg" class="d-block mx-auto img-fluid shadow_perso" alt="...">
                                        <div class="carousel-caption d-none d-sm-block">
                                            <h5 class="ovf display-4"><u class="h5_carousel righteous">Le vélo mécanique</u></h5>
                                        </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
        <!-- //CAROUSEL-->
                        <br>
                        <h2 class="ovf text-center"><a href="#caracteristiques">Découvrez ici nos différents types de vélo</a></h2>
                        <hr class="hr_perso ">
                        <h3 class="ovf text-center righteous my-4">Libre service 24h/24 7j/7 !</h3>
                        
        <!-- CARD 1 -->
                        <div class="row justify-content-center mt-4 pt-4">
                            <div class="col-sm-8 col-md-3 col-10 my-1 rounded">
                                <div class="card shadow_perso card_gauche card_1 h-100">
                                    <div class="card-body text-center">
                                        <h5 class="ovf card-title"><b>Simple !</b></h5>
                                        <p class="card-text">24h/24, 7j/7, vous pouvez voyagez à vélo d'une station à une autre parmi les x stations implantées dans nous 4 villes.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-3 col-10 my-1 rounded">
                                <div class="card shadow_perso card_1 h-100">
                                    <div class="card-body text-center">
                                        <h5 class="ovf card-title"><b>Pas cher</b></h5>
                                        <p class="card-text">Des coûts d'accès au service à partir de 1,10€ par heure, 5,30€ par jour et 32,50€ (hors coût d'utilistation).</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-3 col-10 my-1 rounded">
                                <div class="card shadow_perso card_droite card_1 h-100">
                                    <div class="card-body text-center">
                                        <h5 class="ovf card-title"><b>Rapide</b></h5>
                                        <p class="card-text">2 minutes suffisent pour s'abonner depuis une borne (abonnement 24h ou 7jours) et retirer un vélo.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 mt-4">
                                <div class="row d-flex justify-content-around pt-4">
                                    <div class="col d-flex justify-content-center  my-1 text-center">
                                        <div class="row justify-content-center">
                                            <a href="#" class="ebauche">
                                                <img src="assets/img/ebauche1.png" alt="" class="h-75 w-75 img-fluid rounded-circle mb-2 shadow">
                                                <h6>Louer son véloc</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-center text-center">
                                        <div class="row justify-content-center">
                                            <a href="#" class="ebauche">
                                                <img src="assets/img/ebauche2.png" alt="" class="h-75 w-75 img-fluid rounded-circle mb-2 shadow">
                                                <h6>Rouler à véloc</h6>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col d-flex justify-content-center text-center">
                                        <div class="row justify-content-center">
                                            <a href="#" class="ebauche">
                                                <img src="assets/img/ebauche3.png" alt="" class="h-75 w-75 img-fluid rounded-circle mb-2 shadow">
                                                <h6>Rendre son véloc</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        <!-- //CARD 1 -->
                        <hr class="hr_perso">
                        <h3 class="ovf text-center righteous my-4"><u>Offres & tarifs</u></h3>
                        
        <!-- CARD 2 -->
                        <div class="row justify-content-center">
                            <div class="col-sm-8 col-md-3 col-10 my-1 rounded">
                                <div class="card shadow_perso card_gauche">
                                    <div class="card-body text-center">
                                        <a href="#">
                                            <h5 class="card-title title_offres">Libre service<br>1 Heure</h5>
                                            <p class="card-text">à partir de 1€10</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-3 col-10 my-1 rounded">
                                <div class="card shadow_perso">
                                    <div class="card-body text-center">
                                        <a href="#">
                                            <h5 class="card-title title_offres">Libre service<br>1 Jour</h5>
                                            <p class="card-text">à partir de 5€30</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8 col-md-3 col-10 my-1 rounded">
                                <div class="card shadow_perso card_droite">
                                    <div class="card-body text-center">
                                        <a href="">
                                            <h5 class="card-title title_offres">Libre service<br>1 Mois</h5>
                                            <p class="card-text">à partir de 32€50</p>
                                        </a>                                
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3 class="d-flex justify-content-center text-dark pt-4 mt-4">
                            <a class="d-flex justify-content-center text-dark" href="" data-toggle="modal" data-target="#modalSignIn">
                                <u class="ovf text-center righteous liens_je_reserve">Je réserve tout de suite</u>
                            </a>
                        </h3>
        <!-- //CARD 2 -->
                    </div>
<!-- //HOME -->
<!-- VILLE -->
                    <div class="" id="ville">
                        <h2 class="display-4 navbar-brand d-flex justify-content-center">
                            <a class=" navbar-brand d-flex justify-content-center text-dark mx-auto text-wrap" href="#">
                                <i class="fas fa-biking fa-4x d-none d-sm-block pr-1"></i>
                                <h2 class="display-4 text-center"> Louer un vélo à <span class="righteous"><u id="choiseTown">Lille</u></span></h2>
                            </a>
                        </h2>
                        <div class="d-flex justify-content-center">
                            <div class="btn-group ">
                                <button type="button" class="btn btn-lg btn-secondary">Changer de ville</button>
                                <button type="button" class="btn btn-lg btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu">
                                    <button class="dropdown-item" type="button" onclick="getVilleParis()" id="paris" name="indexParis" >Paris</button>
                                    <button class="dropdown-item" type="button" onclick="getVilleBordeaux()" id="bordeaux" name="indexBordeaux" >Bordeaux</button>
                                    <button class="dropdown-item" type="button" onclick="getVilleLyon()" id="lyon" name="indexLyon" >Lyon</button>
                                    <button class="dropdown-item" type="button" onclick="getVilleLille()" id="lille" name="indexLille" >Lille</button>
                                </div>
                            </div>
                        </div>        
                        <div class="google_map container jumbotron jumbotron-fluid border py-4 mt-4 shadow_perso">
                            <h2 class=" ovf text-center mb-4 righteous">Où trouver une borne ?</h2>
                            <div class="row d-flex justify-content-around mb-2">
                                <div class="station col-sm-6 col-md-3 text-center">
                                    <h5><u><a id="borne1" class="text-dark liens_bornes" href="https://www.google.com/maps/dir//50.6280053,3.0506935/@50.6280126,2.9806815,12z" target="_blank">Borne rue Gambetta </a><i class="fas fa-map-marker-alt"></i></u></h5>
                                    <small id="textborne1">280 rue Léon Gambetta</small>
                                </div>
                                <div class="station col-sm-6 col-md-3 text-center">
                                    <h5><u><a id="borne2" class="text-dark liens_bornes" href="https://www.google.com/maps/dir//50.6365045,3.0699617/@50.6360552,3.0655452,16z" target="_blank">Borne Lille Flandres </a><i class="fas fa-map-marker-alt"></i></u></h5>
                                    <small id="textborne2">Gare lille Flandres, 1 rue de Tournai</small>
                                </div>
                                <div class="station col-sm-6 col-md-3 text-center">
                                    <h5><u><a id="borne3" class="text-dark liens_bornes" href="https://www.google.com/maps/dir//50.6266536,3.0689205/@50.626575,2.9984179,12z" target="_blank">Borne parc J.B. Lebas </a><i class="fas fa-map-marker-alt"></i></u></h5>
                                    <small id="textborne3">Boulevard Jean-Baptiste Lebas</small>
                                </div>
                                <div class="station col-sm-6 col-md-3 text-center">
                                    <h5><u><a id="borne4" class="text-dark liens_bornes" href="https://www.google.com/maps/dir//50.6335986,3.0547622/@50.633589,3.0503606,16z" target="_blank">Borne rue Nationale </a><i class="fas fa-map-marker-alt"></i></u></h5>
                                    <small id="textborne4">129 rue Nationale</small>
                                </div>
                            </div>
    <!-- GOOGLE MAP -->
                            <div class="mt-4 row d-flex justify-content-center">
                                <iframe id="iframe" src="https://www.google.com/maps/d/embed?mid=1MAvgFoHg9MbNU1Rn23Us8sj2TfYPLmDx" width=85% height="480"></iframe>
                            </div>
    <!-- // GOOGLE MAP -->
                            <br>
                            <p class="text-center">A l'heure actuelle à <span class="righteous"><u id="choiseTown2">Lille</u></span>, il reste <b class="nbVelo">143</b> vélos</p>
                        </div>
                                

                        
                        <h3 class="d-flex justify-content-center text-dark pt-4 mt-4">
                            <a class="d-flex justify-content-center text-dark" href="" data-toggle="modal" data-target="#modalSignIn">
                                <u class="ovf text-center righteous liens_je_reserve">Je réserve tout de suite</u>
                            </a>
                        </h3>
                    </div>
<!-- // VILLE -->
<!-- CARACTERISTIQUES -->
                    <div class="" id="caracteristiques">
                        <div class="row d-flex justify-content-center mb-2">
                            <h2 class="navbar-brand text-dark">
                                <a class="navbar-brand d-flex justify-content-center text-center text-wrap text-dark mx-auto" href="#">
                                    <i class="fas fa-biking fa-4x d-none d-sm-block pr-1"></i>
                                    <h2 class="display-4 text-center">Spécificités de nos <span class="righteous">vélos</span></h2>
                                </a>
                            </h2>
                        </div>
                            
                        <div class="mt-4 container-fluid">
                            <div class="row d-flex justify-content-center align-items-center py-4">
                                <div class="col-sm-10 d-flex justify-content-center">
                                    <img id="velo_caracteristiques" class="d-none d-sm-block img-fluid " src="assets/img/caracteristiquesVelos.png" alt="image vélo">
                                </div>
                                
                            </div>
    <!-- TABLEAU CARACTERISTIQUES -->
                            <div class="row d-flex justify-content-center pt-4">
                                <table class="col-9 table table-striped border shadow_perso">
                                    <thead>
                                        <tr>
                                            <th class="righteous thead_tableau" scope="col">Type de Véloc</th>
                                            <th class="text-center righteous thead_tableau" scope="col">Mécanique</th>
                                            <th class="text-center righteous thead_tableau" scope="col">Électrique</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="righteous th_tableau">Matériaux</th>
                                            <td class="text-center">Aluminium</td>
                                            <td class="text-center">Aluminium</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="righteous th_tableau">Nombre de vitesse</th>
                                            <td class="text-center">Manette Shimuno 7 vitesses</td>
                                            <td class="text-center">Manette Shimuno 8 vitesses</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="righteous th_tableau">Poids</th>
                                            <td class="text-center">11kg</td>
                                            <td class="text-center">25kg</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="righteous th_tableau">Taille</th>
                                            <td class="text-center">28 pouces</td>
                                            <td class="text-center">28 pouces</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="righteous th_tableau">Batterie</th>
                                            <td class="text-center">X</td>
                                            <td class="text-center">Lithium-ION 36V8AHFST</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="righteous th_tableau">Autonomie</th>
                                            <td class="text-center">X</td>
                                            <td class="text-center">40km selon l'utilisation</td>
                                        </tr>
                                    </tbody>
                                </table>
    <!-- // TABLEAU CARACTERISTIQUES -->
                            </div>
                        </div>
                        <h3 class="d-flex justify-content-center text-dark pt-4 mt-4">
                            <a class="d-flex justify-content-center text-dark" href="" data-toggle="modal" data-target="#modalSignIn">
                                <u class="ovf text-center righteous liens_je_reserve">Je réserve tout de suite</u>
                            </a>
                        </h3>
                    </div>
    <!-- FOOTER -->
                <footer id="footer" class="roboto text-light bg-dark">
                        <div class="row d-flex justify-content-center mb-2">
                            <h2 class="navbar-brand text-light">
                                <a class="navbar-brand d-flex justify-content-center text-center text-wrap text-light-perso mx-auto" href="#">
                                    <i class="fas fa-biking fa-4x d-none d-sm-block pr-1"></i>
                                    <h2 class="display-4 text-center"><span class="righteous">Contact et info</span></h2>
                                </a>
                            </h2>
                        </div>
                    
                    <div class="container">
    <!-- CONTACT DESIGN MAC -->
                        <div class="screen my-4">
                            <div class="screen-header">
                                <div class="screen-header-left">
                                    <div class="screen-header-button maximize"></div>
                                    <div class="screen-header-button minimize"></div>
                                    <div class="screen-header-button close"></div>
                                </div>
                                <div class="screen-header-right">
                                    <div class="screen-header-ellipsis"></div>
                                    <div class="screen-header-ellipsis"></div>
                                    <div class="screen-header-ellipsis"></div>
                                </div>
                            </div>
                            <div class="screen-body">
                                <div class="screen-body-item left">
                                    <div class="app-title">
                                        <span>CONTACTEZ</span>
                                        <span>NOUS</span>
                                    </div>
                                    <div class="app-contact">
                                        SIEGE SOCIAL : 1 AVENUE DE PARIS, 62300 LENS
                                        <br>TELEPHONE : +33 6 xx xx xx xx
                                    </div>
                                </div>
                                <div class="screen-body-item">
                                    <form method="POST" action="admin/recceuil.php"  class="app-form">
                                        <div class="app-form-group">
                                            <input class="app-form-control" type="text" name="nom_contact" placeholder="VOTRE NOM">
                                        </div>
                                        <div class="app-form-group">
                                            <input class="app-form-control" type="email" name="email_contact" placeholder="E-MAIL">
                                        </div>
                                        
                                        <div class="app-form-group message">
                                            <input class="app-form-control" type="text" name="message_contact" placeholder="MESSAGE">
                                        </div>
                                        <div class="app-form-group buttons">
                                            <button class="app-form-button" name="contactez_nous" type="submit">ENVOYER</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    <!-- // CONTACT DESIGN MAC -->
    <!-- RESAUX SOCIAUX -->
                        <div id="social-platforms" class="row justify-content-center pt-4">
                            <a class="btn btn-icon btn-facebook" href="#"><i class="fab fa-facebook"></i><span>Facebook</span></a>
                            <a class="btn btn-icon btn-twitter" href="#"><i class="fab fa-twitter"></i><span>Twitter</span></a>
                            <a class="btn btn-icon btn-googleplus" href="#"><i class="fab fa-google-plus"></i><span>Google+</span></a>
                            <a class="btn btn-icon btn-pinterest" href="#"><i class="fab fa-pinterest"></i><span>Pinterest</span></a>
                            <a class="btn btn-icon btn-linkedin" href="#"><i class="fab fa-linkedin"></i><span>LinkedIn</span></a>
                        </div>
                    </div>
                    <br><br><br><br><br><br><br><br><br>
                    <div class="text-center">Made by Rassou.</div>
    <!-- // RESAUX SOCIAUX -->
                </footer>
<!-- // FOOTER -->



                    
                </section>
<!-- // SECTION -->





<!-- MODAL -->
    <!-- SIGNUP -->
                <div class="modal fade" id="modalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
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
                                        <form method="POST" action="admin/recueil.php" onsubmit="return verifier(this);">
                                            <!-- SEXE -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-male" aria-hidden="true"></i> </span>
                                                </div>
                                                <select required id="sexe_utilisateur" name="sexe_utilisateur" class="form-control">
                                                    <option selected disabled>Sexe</option>
                                                    <option value="m">Homme</option>
                                                    <option value="f">Femme</option>    
                                                </select>
                                            </div>
                                            <!-- NOM -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-id-card-o" aria-hidden="true"></i> </span>
                                                </div>
                                                <input required name="nom_utilisateur" class="form-control" placeholder="Nom" type="text">
                                            </div>
                                            <!-- PRENOM -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-id-card" aria-hidden="true"></i></span>
                                                </div>
                                                <input required name="prenom_utilisateur" class="form-control" placeholder="Prénom" type="text">
                                            </div>
                                            <!-- E-MAIL -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                </div>
                                                <input required name="adresse_mail_utilisateur" class="form-control" placeholder="Adresse mail" type="email">
                                            </div> 
                                            <!-- DATE DE NAISSANCE -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fas fa-birthday-cake"></i> </span>
                                                </div>
                                                <input required name="date_naissance_utilisateur" class="form-control" placeholder="Date de naissance" value="Date de naissance" type="date">
                                            </div>
                                            <!-- PASSWORD -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input required name="password_utilisateur" class="form-control" placeholder="Mot de passe" type="password">
                                            </div> 
                                            <!-- REPETER PASSWORD -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                </div>
                                                <input required name="password_utilisateur2" class="form-control" placeholder="Répeter votre mot de passe" type="password">
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
                </div>
    <!-- // MODAL SIGN UP -->
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
                                        <form method="POST" action="admin/recueil.php">
                                            <!-- E-MAIL -->
                                            <div class="form-group input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                                </div>
                                                <input name="adresse_mail_utilisateur" class="form-control" placeholder="Adresse e-mail" type="email">
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
                                                <button name="form_connexion" type="submit" class="btn btn-primary btn-block">Se connecter</button>
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
    <!-- MODAL RESERVER -->
                <div class="modal fade" id="modalReserver" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="card bg-light">
                                <article class="card-body w-100 mx-auto" style="max-width: 700px;">
                                    <h5>Formulaire de réservation</h5>
                                    <!-- <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScAB5mnq2ZDGT02b0JuMCgED3vOh8lHPQ9n1XJ65bfUVbwrVA/viewform?embedded=true" width="100%" height="1370" frameborder="0" marginheight="0" marginwidth="0">Chargement…</iframe> -->
                                        
                                    <!-- Set up a container element for the button -->
                                    <div class="mx-auto pt-3" id="paypal-button-container"></div>
                                    <!-- Include the PayPal JavaScript SDK -->
                                    <!-- <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script> -->
                                    <script>
                                        // Render the PayPal button into #paypal-button-container
                                        paypal.Buttons().render('#paypal-button-container');
                                    </script>
                                </article>
                            </div> 
                        </div>
                    </div>
                </div>
    <!-- // MODAL RESERVER -->

    <!-- MODAL MESSAGE ENVOYÉ -->
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
                                        <form method="POST" action="admin/recueil.php">
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
                                                <button name="form_connexion" type="submit" class="btn btn-primary btn-block">Se connecter</button>
                                            </div>       
                                            <p class="text-center">Pas encore de compte?<a href="" class="pl-1" data-toggle="modal" data-target="#modalSignUp" data-dismiss="modal">Sign up</a></p>                                                                 
                                        </form>
                                    </article>
                                </div> 
                            
                            </div>
                        </div>
                    </div>
                </div>
    <!-- // MODAL MESSAGE ENVOYÉ -->
<!-- // MODAL -->
            </div>


<!-- /////////////// -->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='assets/js/main.js'></script>

</body>
</html>