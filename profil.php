<?php
require 'includes/header.php';
$title = 'Profil - Stuliday';

?>


<div class="container">
    <h2 class="">Mon Profil : </h2>
    <div class="column is-half">
        <div class="field">
            <label class="label">Name</label>
            <div class="control">
                <input class="input is-success" type="text" placeholder="Text input">
            </div>
        </div>

        <div class="field">
            <label class="label">Username</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Text input" value="bulma">
            </div>
        </div>

        <div class="field">
            <label class="label">Adress</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="text" placeholder="Your adress" value="">
            </div>
        </div>

        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input is-success" type="email" placeholder="Email input" value="hello@">
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
