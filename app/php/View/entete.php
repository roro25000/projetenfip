<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <script src="../../../public/bootstrap-4.0.0/dist/js/bootstrap.min.js" ></script>
        <link rel="stylesheet" href="../../../public/ionicons-2.0.1/css/ionicons.min.css">

        <link rel="stylesheet" href="../../../public/bootstrap-4.0.0/dist/css/bootstrap.min.css">
        <link href="../../../public/css/business-casual.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">


        <link rel="icon" type="image/png" href="../../../public/img/equipe/logo scp volley.jpg" /><title>SCP VOLLEY</title>

    </head>
    <body>
        <?php
        session_start();
        ?>
        <nav class="navbar navbar-expand-lg navbar-light entete couleur">
            <a class="navbar-brand" href="index.php"><img src="../../../public/img/equipe/logo scp volley.jpg" width="50" height="50"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="calendrier.php">Calendrier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="catalogue.php">Catalogue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Inscription.php">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>


                    <?php
                    if (isset($_SESSION['identifiant'])) {
                        ?>    
                        <li class="nav-item">
                            <a class="nav-link" href="gestionAdherent.php">Administration</a>
                        </li>

                    </ul><ul class="nav navbar-nav navbar-right">
                        <li>
                            <form id="deconnexionForm" action="espaceadherent.php" method="POST">
                                <input type="hidden" value="deconnexion" name="deconnexion">
                                <a class="nav-link" href="javascript:{}" onclick="document.getElementById('deconnexionForm').submit();" role="button" aria-haspopup="true" aria-expanded="false" ><span class="ion-person active"></span> Deconnexion</a>
                            </form>
                        </li>
                    </ul>
                    <?php
                } else {
                    echo '</ul><ul class="nav navbar-nav navbar-right">
                              <li>
                                <a class="nav-link" href="espaceadherent.php" role="button" aria-haspopup="true" aria-expanded="false"><span class="ion-person active" data-pack="default" data-tags="users, staff, head, human"></span> Connexion</a>
                                
                              </li>
                          </ul>';
                }
                ?>


            </div>
        </nav>
