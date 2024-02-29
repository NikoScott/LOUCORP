<?php

$confirmationClass = "";

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Récupérer les valeurs des champs
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $etage = $_POST['message'];
    $superficie = $_POST['message'];

    // Vérifier si tous les champs sont saisis
    if (!empty($nom) 
    && !empty($prenom) 
    && !empty($email) 
    && !empty($phone) 
    && !empty($message) 
    && !empty($etage) 
    && !empty($superficie)) {
        // Vérifier si l'adresse e-mail est valide
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Adresse e-mail de destination
            $to = "nico.pereire@gmail.com";

///////////////// loucorp.ed@gmail.com
///   MODIFIER ADRESSE AVANT PROD            

            // Sujet du message
            $subject = "Nouveau message de LOUCORP.fr";
            // Corps du message
            $body = "   Prenom: $prenom\n
                        Nom: $nom\n
                        Email: $email\n
                        Téléphone: $phone\n
                        Etage: $etage\n
                        Superficie: $superficie\n
                        Message: $message";
            // En-têtes du message
            $headers = "From: $email";

            // Envoyer l'e-mail
            if (mail($to, $subject, $body, $headers)) {
                $confirmationMessage = "Merci $prenom $nom! <br>
                Votre message a été envoyé avec succès.<br><br>
                LOUCORP vous contactera ou vous enverra votre devis rapidement";
                $confirmationClass = "success";
            } else {
                $confirmationMessage = "Une erreur s'est produite lors de l'envoi de votre message. Veuillez réessayer svp.";
                $confirmationClass = "warning";
            }
        } else {
            // L'adresse e-mail n'est pas valide
            $confirmationMessage = "Veuillez saisir une adresse e-mail valide.";
            $confirmationClass = "danger";
        }
    } else {
        // Tous les champs ne sont pas saisis
        $confirmationMessage = "Veuillez remplir tous les champs du formulaire.";
        $confirmationClass = "danger";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description"
        content="Votre partenaire de confiance pour des travaux de plaquisterie, plâtrerie et stafferie à Nice et dans les Alpes-Maritimes. Qualité, réactivité et mobilité garanties. Contactez-nous dès aujourd'hui pour concrétiser vos projets." />
    <title>LOUCORP</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords"
        content="plaquisterie, plâtrerie, stafferie, Nice, Alpes-Maritimes, rénovation, construction, devis rapide, travail de qualité" />
    <meta name="author" content="DevWebConcept" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- CSS personnalisé -->
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body class="">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <!-- <a class="navbar-brand mx-auto text-light" href="#page-top">LOUCORP</a> -->
            <img src="assets/img/logo-.png" alt="logo de l'entreprise" style="height: 60px;">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto my-2 my-lg-0 text-center">
                    <li class="nav-item px-3">
                        <a class="nav-link text-light text-uppercase" href="#">Accueil</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light text-uppercase" href="#about">A propos de nous</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light text-uppercase" href="#competence">Nos compétences</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light text-uppercase" href="#realisation">Nos réalisations</a>
                    </li>
                    <li class="nav-item px-3">
                        <a class="nav-link text-light text-uppercase" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Home -->
    <div id="home" class="d-flex flex-column mb-4 mx-auto justify-content-center">
        <h1 class="text-center mb-0  fade-in" style="font-size: 100px">LOUCORP</h1>
        <h3 class="text-center mb-4 "> INNOVATION BATIMENT </h3>
        <h5 class="text-center mt-2 mb-4 fst-italic "> Innovons ensemble !</h5>
        <div class="container mb-4">
            <div class="row justify-content-center">
                <div class="text-center">
                    <div class="scrolling-container">
                        <div class="scrolling-text">
                            <span class="px-3 mobile">FAUX PLAFONDS</span>
                            <span class="px-3 mobile">CLOISONS</span>
                            <span class="px-3 mobile">HABILLAGE</span>
                            <span class="px-3 mobile">ENDUITS</span>
                            <span class="px-3 mobile">ISOLATION</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="mt-4 mx-auto btn btn-bordeau text-white shadow-xl" href="#contact">Obtenez votre devis rapidement
            !</a>
    </div>
    <!-- About -->
    <div id="about" class="text-white text-center">
        <div class="d-flex justify-content-center mx-auto">
            <div class="vr"></div>
        </div>
        <div class="col-xl-8 text-center my-4 mx-auto mx-3 lh-lg">
            <p class="fs-4">
                Découvrez LOUCORP,<br>
                votre partenaire de confiance pour des travaux de
                plaquisterie, plâtrerie et stafferie à Nice et les Alpes-Maritimes.
            </p>
            <br />
            <p class="fs-5">
                Nous garantissons un travail de qualité, des devis rapides et une
                mobilité sur l'ensemble du département. Faites confiance à notre
                équipe expérimentée pour concrétiser vos projets de rénovation et
                d'embellissement, où que vous soyez dans la région.
            </p>
        </div>
        <div class="d-flex justify-content-center mx-auto">
            <div class="vr"></div>
        </div>
        <div class="d-flex flex-wrap mx-auto justify-content-center align-items-center">
            <div class="col-xl-6 mx-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia ad perferendis beatae vero. Magnam expedita deserunt nobis adipisci aliquam dolorem possimus illo nam consequatur tenetur aut iste animi, ex tempora.
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum voluptate sint quo earum vitae dolores totam vero temporibus enim fuga assumenda, architecto officiis aperiam ratione. Ducimus praesentium modi voluptatibus nemo?
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Delectus odit, qui nam voluptatum recusandae explicabo, at voluptatibus quos quasi harum dicta! Esse asperiores laboriosam dolor nesciunt provident vel quaerat delectus!
            </div>
            <div class="mx-4 p-4">
                <img src="assets/img/profil.jpg" alt="photo de profil" style="width: 350px;">
            </div>
        </div>
        <div class="d-flex justify-content-center mx-auto">
            <div class="vr"></div>
        </div>
    </div>
    <!-- Competences -->
    <div id="competence" class="d-flex flex-wrap col-xl-8 col-md-8 mx-auto text-center lh-lg">
        <div class="mx-4 mb-5">
            <i class="bi bi-layers fs-1"></i>
            <p class="fs-5 mt-2 mb-4">PLAQUISTE</p>
            <p>
                Notre artisan plaquiste est un expert dans l'installation de cloisons
                et de faux plafonds. Avec une précision méticuleuse et un souci du
                détail, il crée des espaces fonctionnels et esthétiques dans vos
                intérieurs. Que ce soit pour une nouvelle construction ou une
                rénovation, notre plaquiste utilise les meilleurs matériaux et
                techniques pour garantir des résultats durables et de qualité
                supérieure.
            </p>
        </div>
        <div class="mx-4 mb-5">
            <i class="bi bi-pentagon fs-1"></i>
            <p class="fs-5 mt-2 mb-4">STAFFEUR</p>
            <p>
                Le talent de notre artisan staffeur réside dans la création de
                décorations intérieures élégantes et sophistiquées. Grâce à son
                savoir-faire artisanal, il transforme les espaces en véritables œuvres
                d'art en utilisant le plâtre comme matériau principal. Que ce soit
                pour des motifs classiques ou des designs contemporains, notre
                staffeur donne vie à vos idées et apporte une touche d'élégance à
                chaque projet.
            </p>
        </div>
        <div class="mx-4 mb-5">
            <i class="bi bi-bricks fs-1"></i>
            <p class="fs-5 mt-2 mb-4">PLATRIER</p>
            <p>
                Notre plâtrier est un professionnel expérimenté dans l'application du
                plâtre pour lisser et embellir les surfaces murales. Grâce à sa
                maîtrise des techniques traditionnelles et des outils modernes, il
                assure un rendu lisse et uniforme, prêt à recevoir la finition de
                votre choix. Du rebouchage des fissures à la création de moulures
                décoratives, notre plâtrier donne une nouvelle vie à vos murs avec son
                expertise et son savoir-faire inégalés.
            </p>
        </div>
    </div>
    <hr class="separator col-8 mx-auto" style="height:4px;background:#7f0000;">
    <!-- Réalisations -->
    <div id="realisation" class="mb-5">
        <h1 class="text-center mb-5">Nos réalisations</h1>
        <div class="col-10 mx-auto d-flex flex-wrap text-center">
            <img class="img-size p-1 slide-in" src="assets/img/placo1.jpeg" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/placo2.jpeg" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/placo3.jpeg" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/placo4.jpeg" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/placo5.jpeg" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/placo6.jpeg" alt="photo de realisation">
        </div>
    </div>
    <hr class="separator col-8 mx-auto" style="height:4px;background:#7f0000;">
    <!-- Contact -->
    <div id="contact" class="my-auto">
        <h1 class="text-center mb-5">Nous contacter</h1>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                <div class="container mt-2">

                <!-- CONFIRMATION -->
                <?php if(!empty($confirmationClass)) { ?>
                    <!-- CONFIRMATION -->
                    <div id="msg" class="text-center alert alert-<?php echo $confirmationClass;?>" role="alert"><?php echo $confirmationMessage; ?></div>
                <?php } ?>

                    <form method="POST" action="">
                        <div class="d-flex mb-3">
                            <div class="form-group col-md-6 pe-1">
                                <label for="prenom">Prénom :</label>
                                <input type="text" placeholder="Lou" class="form-control" id="prenom" name="prenom"
                                    required />
                            </div>
                            <div class="form-group col-md-6 ps-1">
                                <label for="nom">NOM :</label>
                                <input type="text" placeholder="CORP" class="form-control" id="nom" name="nom" required />
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="email">Email :</label>
                            <input type="email" placeholder="lou@corp.fr" class="form-control" id="email" name="email" required />
                        </div>
                        <div class="form-group mb-4">
                            <label for="phone">Téléphone :</label>
                            <input type="tel" placeholder="06 12 34 56 78" class="form-control" id="phone" name="phone" required/>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="form-group col-md-6 pe-1">
                                <label for="etage">Etage :</label>
                                <input type="number" placeholder="ex: 1" class="form-control" id="etage" name="etage" required/>
                            </div>
                            <div class="form-group col-md-6 ps-1">
                                <label for="etage">Superficie :</label>
                                <input type="number" placeholder="en m²" class="form-control" id="superficie"
                                    name="superficie" required/>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="message">Message :</label>
                            <textarea class="form-control" placeholder="Détaillez votre demande au maximum" id="message"
                                name="message" rows="4" required></textarea>
                        </div>
                        <div class="text-center">
                            <!-- <div class="g-recaptcha mb-2 d-flex justify-content-center" data-sitekey="6LeGuSopAAAAAN-ZJpFBKomc67kXpuUU27vKugwE"></div>
                            <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response"> -->
                            <button type="submit" class="btn btn-bordeau text-white" name="submit" id="submit-btn">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-4 text-center mb-5 mb-lg-0">
                <i class="bi-phone fs-2 mb-3 text-muted"></i>
                <br />
                <a href="tel:+33612248452" class="text-decoration-none" style="color: #640000">+33 6 12 24 84 52</a>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="bg-light mt-2">
        <div class="container px-4 px-lg-5">
            <div class="text-center text-muted">
                Copyright &copy; 2022 - S.A.R.L LOUCORP
            </div>
            <div class="small text-center text-muted "> Site réalisé par <a href="https://devwebconcept.com"
                    class="text-muted">DevWebConcept</a></div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>