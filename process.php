<?php

    $title = 'Processing - Stuliday';
    require 'includes/header.php';

    // Verrouiller l'accès à la page process aux méthodes POST.
    if ('POST' != $_SERVER['REQUEST_METHOD']) {
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    // Le elseif va servir au traitement du formulaire de création de produits
    } elseif (isset($_POST['ad_submit'])) {
        // Vérification back-end du remplissage du formulaire
        if (!empty($_POST['ad_name']) && !empty($_POST['ad_description']) && !empty($_POST['ad_price']) && !empty($_POST['ad_city'])) {
            // Définition des variables
            $name = strip_tags($_POST['ad_name']);
            $description = strip_tags($_POST['ad_description']);
            $price = intval(strip_tags($_POST['ad_price']));
            $city = strip_tags($_POST['ad_city']);
            // Assigne la variable user_id à partir du token de session
            $ad_id = $_SESSION['id'];
            // Lancement de la fonction d'ajout de produits
            ajoutProduits($title, $content, $address, $price, $city, $author);
        }
    }
    require 'includes/footer.php';
