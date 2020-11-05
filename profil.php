<?php
require 'includes/header.php';
$title = 'Profil - Stuliday';

?>


<div class="container">
    <h2 class="">Mon Profil : </h2>
    <div class="column is-half">
        <div class="field">
            <label class="label">Fullname</label>
            <div class="control">
                <input class="input is-success" type="text">
            </div>
        </div>

        <div class="field">
            <label class="label">Address</label>
            <div class="control has-icons-left has-icons-right">
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

<?php
require 'includes/footer.php';
