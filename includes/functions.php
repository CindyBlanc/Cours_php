<?php

require 'includes/config.php';

function inscription($email_su, $pass_su, $repass_su)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '{$email_su}'";
    $res = $conn->query($sql);
    $count = $res->fetchColumn();

    if (!$count) {
        if ($pass_su === $repass_su) {
            try {
                $pass_su = password_hash($pass_su, PASSWORD_DEFAULT);
                $sth = $conn->prepare('INSERT INTO users (email,password) VALUES (:email, :password)');
                $sth->bindValue(':email', $email_su);
                $sth->bindValue(':password', $pass_su);
                $sth->execute();

                echo "L'utilisateur a bien été enregistré !";
            } catch (PDOException $e) {
                echo 'Error'.$e->getMEssage();
            }
        } else {
            echo '<div class="notification is-danger is-light"><button class="delete"></button> Les mots de passe ne concordent pas !';
        }
    } elseif ($count > 0) {
        echo '<div class="notification is-danger is-light"><button class="delete"></button> Cette adresse existe déjà ! </div>';
    }
}

function connexion($email_login, $pass_login)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '{$email_login}'";
    $res = $conn->query($sql);
    $user = $res->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        $db_pass = $user['password'];
        if (password_verify($pass_login, $db_pass)) {
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['id'];
            header('Location: index.php?');
        } else {
            echo '<div class="notification is-danger is-light"><button class="delete"></button>Mot de passe erroné !</div>';
        }
    } else {
        echo '<div class="notification is-danger is-light"><button class="delete"></button> Cet utilisateur n\'existe pas ! </div>';
    }
}

// Fonction poutr testpost.php

function ajoutProduits($title, $content, $address, $price, $city, $author)
{
    global $conn;
    // Vérification du prix (doit être un entier, et inférieur à 1 million d'euros)
    if (is_int($price) && $price > 0 && $price < 1000000) {
        // Utilisation du try/catch pour capturer les erreurs PDO/SQL
        try {
            // Création de la requête avec tous les champs du formulaire
            $sth = $conn->prepare('INSERT INTO adverts (title,content,address,city,price,author) VALUES (:title, :content, :address, :city, :price, :author)');
            $sth->bindValue(':title', $title, PDO::PARAM_STR);
            $sth->bindValue(':content', $content, PDO::PARAM_STR);
            $sth->bindValue(':address', $address, PDO::PARAM_STR);
            $sth->bindValue(':city', $city, PDO::PARAM_STR);
            $sth->bindValue(':price', $price, PDO::PARAM_INT);
            $sth->bindValue(':author', $author, PDO::PARAM_INT);

            // Affichage conditionnel du message de réussite
            if ($sth->execute()) {
                echo "<div class='alert alert-success'> Votre article a été ajouté à la base de données </div>";
                header('Location: profil.php?');
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
}
