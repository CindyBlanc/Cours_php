<?php
$title = 'Places to Stay - Stuliday';
require 'includes/header.php';
?>
<div class="container">
    <h3 class="title is-4 is-spaced">Places to stay</h3>

    <div class="columns is-multiline is-centered">
        <?php
        viewPlaces();
    ?>
    </div>
</div>
<?php
require 'includes/footer.php';
