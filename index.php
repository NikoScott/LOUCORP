<?php

$confirmationClass = "";

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Récupérer les valeurs des champs
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $etage = $_POST['etage'];
    $superficie = $_POST['superficie'];
    $message = $_POST['message'];

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
            // Validation CAPTCHA côté serveur
            $recaptchaSecretKey = "6LdIEaApAAAAAI8opPPUK-SmQ4idCnltRqPj_PwV";
            $recaptchaResponse = $_POST['g-recaptcha-response'];
            $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
            $recaptchaData = array(
                'secret' => $recaptchaSecretKey,
                'response' => $recaptchaResponse
            );

            $options = array(
                'http' => array (
                    'method' => 'POST',
                    'header' => 'Content-Type: application/x-www-form-urlencoded',
                    'content' => http_build_query($recaptchaData)
                )
            );
            $context  = stream_context_create($options);
            $verify = file_get_contents($recaptchaUrl, false, $context);
            $captchaSuccess = json_decode($verify);

            if ($captchaSuccess->success) {
                // CAPTCHA validé avec succès, envoyer l'e-mail

            // Adresse e-mail de destination
            $to = "loucorp.ed@gmail.com";
       
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
    <meta http-equiv="Content-Language" content="fr">
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="bootstrap-icons-1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="bootstrap-5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personnalisé -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a href="#"><img src="assets/img/logo.png" alt="Logo de l'entreprise LOUCORP" style="height: 60px;"></a>
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
    <div id="home-text" class="position-relative">
        <h1 class="text-center mb-2 fade-in" style="font-size: 120px">LOUCORP</h1>
        <h2 class="text-center fs-3 mb-4"> INNOVATION BATIMENT </h2>
        <h3 class="text-center mt-2 mb-4 fs-4 fst-italic "> Innovons Ensemble !</h3>
        <div class="container mt-4 mb-4">
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
    </div>
    <a class="mt-4 mx-auto btn btn-bordeau text-white shadow-xl" href="#contact">Obtenez votre devis rapidement !</a>
</div>

    <!-- About -->
    <div id="about" class="text-light-emphasis text-center">
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
            <div class="mx-4 p-4">
                <img src="assets/img/profil.png" alt="photo de profil" style="width: 350px;">
            </div>
            <div class="col-xl-6 mx-4 lh-lg fw-semibold fs-6">
                <i class="bi bi-quote"></i>
                Expert plaquiste avec 20 ans d'expérience dans le domaine, ma passion pour mon métier se reflète dans chaque projet que je réalise où je m'efforce de créer des espaces intérieurs à la fois fonctionnels et esthétiques. Spécialisé dans l'installation de cloisons, de faux plafonds et d'autres éléments en plaque de plâtre, je suis compétent dans la lecture des plans, la prise de mesures précises et la réalisation de découpes complexes pour garantir un résultat impeccable.
                <br>
                <br>
                Je suis reconnu pour mon attention aux détails et mon souci de la finition, ce qui me permet de livrer des travaux de haute qualité à chaque fois. En tant que professionnel fiable et ponctuel, je suis également capable de travailler efficacement en équipe pour répondre aux besoins de mes clients.
                <br>
                <br>
                Je reste constamment à l'affût des nouvelles tendances et des innovations dans le domaine de la plaquisterie afin de proposer des solutions modernes et de haute qualité à mes clients. Je suis impatient de mettre mes compétences au service de votre projet et de contribuer à la création d'un espace exceptionnel qui répondra à vos besoins et dépassera vos attentes.
                <i class="bi bi-quote"></i>
                <br>
            </div>
        </div>
        <p class="col-10 mt-2 fw-semibold text-end">Abdellatif EDDAHBI</p>
        <div class="d-flex justify-content-center mx-auto">
            <div class="vr"></div>
        </div>
    </div>
    <!-- Competences -->
    <div id="competence" class="d-flex flex-wrap col-xl-8 col-md-8 mx-auto text-center lh-lg">
        <h2 class="text-center mx-auto mb-5 shadow-title" style="font-size: 2.5rem;">Nos compétences</h2>
        <div class="mx-4 mb-5">
            <i class="bi bi-layers fs-1"></i>
            <p class="fs-4 mt-2 mb-4">PLAQUISTE</p>
            <p class="fs-6">
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
            <p class="fs-4 mt-2 mb-4">STAFFEUR</p>
            <p class="fs-6">
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
            <p class="fs-4 mt-2 mb-4">PLATRIER</p>
            <p class="fs-6">
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
        <h2 class="text-center mb-5 shadow-title" style="font-size: 2.5rem;">Nos réalisations</h2>
        <div class="col-10 mx-auto d-flex flex-wrap justify-content-center">
            <img class="img-size p-1 slide-in" src="assets/img/IMG_3866.JPG" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/IMG_3868.JPG" alt="photo de realisation">
            <video controls autoplay muted loop>
                <source src="assets/movie/movie.MOV" type="video/mp4" class="slide-in">
            </video>
            <img class="img-size p-1 slide-in" src="assets/img/IMG_3870.JPG" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/IMG_3865.JPG" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/IMG_6605.jpeg" alt="photo de realisation">
            <img class="img-size p-1 slide-in" src="assets/img/IMG_6607.jpeg" alt="photo de realisation">
            
        </div>
    </div>
    <hr class="separator col-8 mx-auto" style="height:4px;background:#7f0000;">
    <!-- Contact -->
    <div id="contact" class="my-auto">
        <h2 class="text-center mb-5 shadow-title" style="font-size: 2.5rem;">Nous contacter</h2>
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
                                <label for="superficie">Superficie :</label>
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
                            <div class="g-recaptcha d-flex justify-content-center" data-sitekey="6LdIEaApAAAAAMuZcVbHrCkgRavhlnPNdBN5Ds32"></div>
                            <br>
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
    <script src="bootstrap-5.3.3/js/bootstrap.bundle.min.js"> </script>
    <script src="assets/js/script.js"></script>
</body>
</html>