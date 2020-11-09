<?php
$title = 'Fiche produit - Stuliday';
require 'includes/header.php';
?>

<div class="container">
    <?php
viewPlace($_GET['id']);
?>

    <div class="has-text-centered">
        <button class="btnBook button is-primary is-outlined modal-button" data-target="modal-ter"
            aria-haspopup="true">Book</button>
        <a class="button is-danger is-outlined" href="places.php">Cancel</a>
    </div>
    <div id="modalBook" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">
                    Do you really want to reserve this place ?
                </p>

            </header>
            <section class="modal-card-body">
                <input type="checkbox">
                I agree to the <a href="#">terms and conditions</a>
            </section>

            <footer class="modal-card-foot">
                <button class="button is-success" name="btnReserved">Yes, book !</button>
                <button class="btnBook button">No thanks
                </button>
            </footer>
        </div>
    </div>
</div>





<?php
require 'includes/footer.php';
