<!DOCTYPE html>
<html lang="fr">
    <head>
        <!-- <base href="/gsb/public/"> -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Galaxy-Swiss Bourdin</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="../..<?php echo RACINE?>/"><img src="img/logo.jpg"width="10%" height="10%"> Remboursement des frais</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <?php if (isset($_SESSION['user'])) { include "hidden_menu.php"; } ?>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-left mt-5">
                <!--
                <h1>A Bootstrap 5 Starter Template</h1>
                <p class="lead">A complete project boilerplate built with Bootstrap</p>
                -->
                <p>
                <?php
                echo $contenu;
                ?>
                </p>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>


    </body>
</html>