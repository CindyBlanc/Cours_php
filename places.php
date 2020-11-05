<?php
$title = 'Places to Stay - Stuliday';
require 'includes/header.php';
?>

<div class="container">
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
            </tr>
        </thead>
        <tbody>
            <?php
        viewPlaces();
    ?>
        </tbody>
    </table>
</div>


<?php
require 'includes/footer.php';
