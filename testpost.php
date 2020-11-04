<?php

$title = 'Ajout de location - Stuliday';
require 'includes/header.php';

$sql = 'SELECT * FROM adverts';
$res = $conn->query($sql);
$adverts = $res->fetchAll();

?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="process.php" method="POST">
                <div class="form-group">
                    <label for="InputName">Title</label>
                    <input type="text" class="form-control" id="InputName" placeholder="Nom de votre article"
                        name="ad_name" required>
                </div>
                <div class="form-group">
                    <label for="InputDescription">Description</label>
                    <textarea class="form-control" id="InputDescription" rows="3" name="ad_description"
                        required></textarea>
                </div>
                <div class="form-group">
                    <label for="InputPrice">Price</label>
                    <input type="number" max="999999" class="form-control" id="InputPrice" placeholder="Prix en €"
                        name="ad_price" required>
                </div>
                <div class="form-group">
                    <label for="InputPrice">Adress</label>
                    <input type="text" class="form-control" id="InputPrice" placeholder="Ville où l'article est situé"
                        name="ad_city" required>
                </div>

                <button type="submit" class="btn btn-success" name="ad_submit">Post</button>
            </form>
        </div>
    </div>
</div>


<?php
require 'includes/footer.php';
