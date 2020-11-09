<?php
require 'includes/header.php';
$title = 'Profil - Stuliday';

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM users WHERE id = '{$user_id}'";
$res = $conn->query($sql);
$user = $res->fetch(PDO::FETCH_ASSOC);

// if (isset($_GET['s'])) {
//     echo '<div class="alert alert-warning">Votre article a bien été supprimé </div>';
// } elseif (isset($_GET['p'])) {
//     echo '<div class="alert alert-success">Votre numéro de téléphone à bien été mis à jour !</div>';
// }

?>

<div class="container" style="margin-top: 10vh;">



    <div class="columns is-centered">
        <div class="column is-half">
            <h3 class="title is-4 is-spaced has-text-centered">Welcome <?php echo $user['username']; ?>
            </h3>
            <form action="process.php" method="post">
                <div class="form-group">

                    <div class="field">
                        <label class="label">Fullname</label>
                        <div class="control">
                            <input class="input is-success" type="text"
                                value="<?php echo $user['username']; ?>"
                                name="username">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-success" type="email"
                                value="<?php echo $user['email']; ?>"
                                name="email">
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Password</label>
                        <div class="control has-icons-left has-icons-right">
                            <input class="input is-success" type="password"
                                value="<?php echo $user['password']; ?>"
                                name="password">
                        </div>
                    </div>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <input type="hidden"
                            value="<?php echo $user['id']; ?>">
                        <input type="submit" class="button is-success" name="user_edit" value="Change">
                    </div>
                    <div class="control">
                        <button class="button is-link is-light"><a href="index.php"> Cancel</a></button>


                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="columns is-centered">
        <div class="column is-half">
            <h3 class="title is-4 is-spaced">Your Addverts</h3>
            <table class="table table-warning">
                <thead>
                    <tr>
                        <th scope="col">Advert</th>
                        <th scope="col">Title</th>
                        <th scope="col">Price</th>
                        <th scope="col">City</th>
                        <th scope="col" colspan=3>Fonctions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        viewAdvertByUser($user_id);
        ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


<?php
require 'includes/footer.php';
