<?php
$title = 'Fiche produit - Stuliday';
require 'includes/header.php';
?>

<div class="container" style="margin-top: 10vh;">
    <?php
viewPlace($_GET['id']);
?>
    <div class="columns is-multiline">
        <div class="column">

            <figure class="image is-228x228">
                <img src="images/imgadverts/chalet.jpg" alt="chalet">
            </figure>
        </div>
        <div class="column">
            <figure class="image is-228x228">
                <img src="images/imgadverts/maisonneige.jpg" alt="int">
            </figure>
        </div>
        <div class="column">
            <figure class="image is-228x228">
                <img src="images/imgadverts/interieur1.jpg" alt="int">
            </figure>
        </div>
        <div class="column">
            <figure class="image is-228x228">
                <img src="images/imgadverts/interieur2.jpg" alt="int">
            </figure>
        </div>

    </div>

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
                <form action="process.php" method="post">

                    <input type="hidden" name="book_id"
                        value="<?php $_GET['id']; ?>">
                    <button type="submit" class="button is-success" name="book_submit" href="book.php">Yes, book
                        !</button>
                </form>
                <a class="btnBook button">No thanks
                </a>
            </footer>
        </div>
    </div>
</div>





<?php
require 'includes/footer.php';
