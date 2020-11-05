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

function adAdverts($title, $content, $address, $city, $price, $images, $author)
{
    global $conn;

    if (is_int($price) && $price > 0 && $price < 1000000) {
        try {
            $sth = $conn->prepare('INSERT INTO adverts (title,content,address,city, price, images, author) VALUES (:title, :content, :address, :city, :price, :images, :author)');
            $sth->bindValue(':title', $title, PDO::PARAM_STR);
            $sth->bindValue(':content', $content, PDO::PARAM_STR);
            $sth->bindValue(':address', $address, PDO::PARAM_STR);
            $sth->bindValue(':city', $city, PDO::PARAM_STR);
            $sth->bindValue(':price', $price, PDO::PARAM_INT);
            $sth->bindValue(':images', $images, PDO::PARAM_STR);
            $sth->bindValue(':author', $author, PDO::PARAM_INT);

            if ($sth->execute()) {
                echo '<div class="has-text-success"> Votre annonce a été ajouté à la base de données </div>';
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
}

function viewPlaces()
{
    global $conn;
    $sth = $conn->prepare('SELECT * FROM adverts');
    $sth->execute();

    $adverts = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($adverts as $advert) {
        ?>
<tr>

    <td><?php echo $advert['title']; ?>
    </td>
    <td><?php echo $advert['content']; ?>
    </td>
    <td><?php echo $advert['price']; ?>
    </td>
    <td><?php echo $advert['address']; ?>
    </td>
    <td><?php echo $advert['city']; ?>
    </td>
    <td> <a
            href="place.php?id=<?php echo $advert['ad_id']; ?>">View
            place</a>
    </td>
</tr>
<?php
    }
}

function viewPlace($id)
{
    global $conn;
    $sth = $conn->prepare("SELECT * FROM adverts WHERE ad_id={$id}");
    $sth->execute();

    $advert = $sth->fetch(PDO::FETCH_ASSOC); ?>
<div class="row">
    <div class="col-12">
        <h1><?php echo $advert['title']; ?>
        </h1>
        <p><?php echo $advert['content']; ?>
        </p>
        <p><?php echo $advert['address']; ?>
        </p>
        <p><?php echo $advert['city']; ?>
        </p>
        <button class="btn btn-danger"><?php echo $advert['price']; ?> </button>
    </div>
</div>
<?php
}
