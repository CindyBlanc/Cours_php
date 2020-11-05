<?php
$title = 'Fiche produit - Stuliday';
require 'includes/header.php';
?>

<div class="container">
    <?php
viewPlace($_GET['id']);
?>
</div>

<?php
require 'includes/footer.php';
