<?php
$title = 'Fiche produit - Stuliday';
require 'includes/header.php';
?>

<div class="container">
    <div class="row">
        <?php
viewPlace($_GET['id']);
?>
    </div>
</div>

<?php
require 'includes/footer.php';
