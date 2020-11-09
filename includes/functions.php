<?php

require 'includes/config.php';

function inscription($email_su, $pass_su, $repass_su, $username)
{
    global $conn;
    $sql = "SELECT * FROM users WHERE email = '{$email_su}'";
    $res = $conn->query($sql);
    $count = $res->fetchColumn();

    if (!$count) {
        if ($pass_su === $repass_su) {
            try {
                $pass_su = password_hash($pass_su, PASSWORD_DEFAULT);
                $sth = $conn->prepare('INSERT INTO users (email,password,username) VALUES (:email, :password, :username)');
                $sth->bindValue(':email', $email_su);
                $sth->bindValue(':password', $pass_su);
                $sth->bindValue(':username', $username);
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
            $_SESSION['username'] = $user['username'];

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

    if (is_int($price) && $price > 0 && $price < 10000000) {
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
                echo '<div class="has-text-success"> Votre annonce a été ajouté à la base de données </div>                         <button class="button is-link is-light"><a href="index.php"> Cancel</a></button>'
                ;
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

    $adverts = $sth->fetchAll(PDO::FETCH_ASSOC); ?>


<?php foreach ($adverts as $advert) {
        ?>

<div class="column is-two-fifths is-offset-1">
    <h4 class="title is-5 is-spaced"><?php echo $advert['title']; ?>
    </h4>
    <img src="images/plaza2.jpg" alt="plaza">
    <div>
        <p><?php echo $advert['content']; ?>
        </p>
        <p><?php echo $advert['city']; ?>
        </p>
    </div>
    <a class="button is-primary is-outlined "
        href="place.php?id=<?php echo $advert['ad_id']; ?>">View
        place</a>

</div>
<?php
    }
}

function viewPlace($id)
{
    global $conn;
    $sth = $conn->prepare("SELECT * FROM adverts WHERE ad_id={$id}");
    $sth->execute();

    $advert = $sth->fetch(PDO::FETCH_ASSOC); ?>

<h1 class="title is-4 is-spaced has-text-centered"><?php echo $advert['title']; ?>
</h1>
<div class="columns">
    <div class="column is-one-fifth"></div>
    <div class="column is-one-third">
        <p><?php echo $advert['content']; ?>
        </p>
    </div>
    <div class="column is-one-fifth has-text-right">
        <p><?php echo $advert['address']; ?>
        </p>
        <p><?php echo $advert['city']; ?>
        </p>
        <p class="btn btn-danger"><?php echo $advert['price'].' € '; ?>
        </p>
    </div>
</div>
<?php
}

function viewAdvertByUser($author)
{
    global $conn;
    $sth = $conn->prepare("SELECT * FROM adverts INNER JOIN users ON id = author WHERE author = {$author}");
    $sth->execute();

    $adverts = $sth->fetchAll(PDO::FETCH_ASSOC);
    foreach ($adverts as $advert) {
        ?>
<tr>
    <th scope="row"><?php echo $advert['ad_id']; ?>
    </th>
    <td><?php echo $advert['title']; ?>
    </td>
    <td><?php echo $advert['price']; ?> €
    </td>
    <td><?php echo $advert['city']; ?>
    </td>
    <td> <a href="place.php?id=<?php echo $advert['ad_id']; ?>"
            class="fa button is-primary">View</a>
    </td>
    <td> <a href="editadvert.php?id=<?php echo $advert['ad_id']; ?>"
            class="fa button is-success">Edit</a>
    </td>
    <td>
        <form action="process.php" method="post">
            <input type="hidden" name="ad_id"
                value="<?php echo $advert['ad_id']; ?>">
            <input type="submit" name="advert_delete" class="button is-danger" value="Delete"></input>
        </form>
    </td>
</tr>
<?php
    }
}

function changeProfil($username, $user_id)
{
    global $conn;

    try {
        $sth = $conn->prepare('UPDATE users SET username=:username WHERE id=:user_id');
        $sth->bindValue(':username', $username);
        $sth->bindValue(':user_id', $user_id);

        if ($sth->execute()) {
            header('Location:profil.php?p');
            echo '<div class="has-text-success"> Votre changement a été ajouté à la base de données </div>';
        }
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
}

// Fonction de suppression des produits. Les arguments renseignés sont des placeholders étant donné qu'ils seront remplacés par les véritables variables une fois la fonction appelée;
function deleteAdvert($user_id, $ad_id)
{
    // Récupération de la connexion à la BDD à partir de l'espace global.
    global $conn;

    // Tentative de la requête de suppression.
    try {
        $sth = $conn->prepare('DELETE FROM adverts WHERE ad_id = :ad_id AND author =:user_id');
        $sth->bindValue(':ad_id', $ad_id);
        $sth->bindValue(':user_id', $user_id);
        if ($sth->execute()) {
            header('Location:profil.php?s');
        }
    } catch (PDOException $e) {
        echo 'Error: '.$e->getMessage();
    }
}

function editAdvert($title, $content, $address, $city, $price, $images, $author)
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
                echo "<div class='alert alert-success'> Votre modification a bien été prise en compte </div>";
                header("Location: profil.php?id={$id}");
            }
        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        }
    }
}
