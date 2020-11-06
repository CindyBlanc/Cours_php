<?php
require 'includes/header.php';
$title = 'Profil - Stuliday';

?>

<div class="container">
    <div class="columns is-centered">
        <div class="column is-half">
            <h3 class="title is-4 is-spaced">Your Profil</h3>

            <div class="field">
                <label class="label">Fullname</label>
                <div class="control">
                    <input class="input is-success" type="text">
                </div>
            </div>

            <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-success" type="text">
                </div>
            </div>

            <div class="field">
                <label class="label">Password</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-success" type="email">
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Change</button>
                </div>
                <div class="control">
                    <button class="button is-link is-light">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="columns is-centered">
        <div class="column is-half">
            <h3 class="title is-4 is-spaced">Your Addverts</h3>
            <table class="table table-warning">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">City</th>
                        <th scope="col" colspan=3>Fonctions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
        viewAdvertByUser($author);
        ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


<?php
require 'includes/footer.php';
