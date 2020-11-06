<?php
$title = 'Fiche produit - Stuliday';
require 'includes/header.php';
?>

<div class="container">
    <?php
viewPlace($_GET['id']);
?>
    <div>
        <button class="button is-primary is-outlined" name="btnReserved">Book</button>
        <a class="button is-danger is-outlined" href="places.php">Cancel</a>
    </div>
</div>





<?php
require 'includes/footer.php';
