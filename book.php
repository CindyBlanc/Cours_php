<?php
require 'includes/header.php';
$title = 'My book - Stuliday';

$user_id = $_SESSION['id'];
$sql = "SELECT * FROM book WHERE book_user_id = '{$user_id}'";
$res = $conn->query($sql);
$user = $res->fetch(PDO::FETCH_ASSOC);

?>

<div class="container" style="margin-top: 10vh;">
    <div class="column has-text-centered" style="margin-top: 10vh;">
        <a class="button is-primary" href="profil.php">My profil</a>
    </div>
    <div class="columns">
        <div class="column is-one-fifth"></div>
        <div class="column">
            <table class="table table-warning is-striped is-narrow is-hoverable is-fullwidth">
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
                    <th scope="col"><?php echo $advert['title']; ?>
                    </th>
                    <th scope="col"><?php echo $advert['price']; ?>
                    </th>
                    <th scope="col"><?php echo $advert['city']; ?>
                    </th>
                    <th scope="col"> <a href="places.php" class="fa button is-primary">View</a>
                    </th>
                    <th scope="col" colspan=3>
                        <form action="process.php" method="post">
                            <input type="submit" name="book_delete" class="button is-danger" value="Delete"></input>
                        </form>
                    </th>

                </tbody>
            </table>
        </div>
        <div class="column is-one-fifth"></div>
    </div>

</div>


<?php
require 'includes/footer.php';
