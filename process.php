<?php

    $title = 'Processing - Stuliday';
    require 'includes/header.php';

    if ('POST' != $_SERVER['REQUEST_METHOD']) {
        echo "<div class='alert alert-danger'> La page à laquelle vous tentez d'accéder n'existe pas </div>";
    } elseif (isset($_POST['ad_submit'])) {
        if (!empty($_POST['ad_name']) && !empty($_POST['ad_price']) && !empty($_POST['ad_description']) && !empty($_POST['ad_address']) && !empty($_POST['ad_city']) && !empty($_POST['ad_images'])) {
            $title = strip_tags($_POST['ad_name']);
            $content = strip_tags($_POST['ad_description']);
            $price = intval(strip_tags($_POST['ad_price']));
            $address = strip_tags($_POST['ad_address']);
            $city = strip_tags($_POST['ad_city']);
            $images = strip_tags($_POST['ad_images']);

            $author = $_SESSION['id'];

            adAdverts($title, $content, $address, $city, $price, $images, $author);
        }
    } elseif (isset($_POST['edit_advert'])) {
        if (!empty($_POST['ad_name']) && !empty($_POST['ad_price']) && !empty($_POST['ad_description']) && !empty($_POST['ad_address']) && !empty($_POST['ad_city']) && !empty(['ad_images'])) {
            $title = strip_tags($_POST['ad_name']);
            $content = strip_tags($_POST['ad_description']);
            $price = intval(strip_tags($_POST['ad_price']));
            $address = strip_tags($_POST['ad_address']);
            $city = strip_tags($_POST['ad_city']);
            $images = strip_tags($_POST['ad_images']);

            $author = $_SESSION['id'];

            editAdvert($title, $content, $address, $city, $price, $images, $author);
        }
    } elseif (isset($_POST['advert_delete'])) {
        $advert = $_POST['ad_id'];
        $user_id = $_SESSION['id'];

        deleteAdvert($user_id, $advert);
    } elseif (isset($_POST['user_edit'])) {
        $username = $_POST['username'];
        $user_id = $_SESSION['id'];

        changeProfil($username, $user_id);
    }

require 'includes/footer.php';
