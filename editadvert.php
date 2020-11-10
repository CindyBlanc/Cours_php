<?php

$title = 'Modification du produit - Le Chouette Coin';
require 'includes/header.php';

$id = $_GET['id'];
$sql = "SELECT * FROM adverts WHERE ad_id={$id}";
$res = $conn->query($sql);
$advert = $res->fetch(PDO::FETCH_ASSOC);

?>

<div class="container" style="margin-top: 10vh;">
    <div class="columns is-centered">

        <div class="column is-four-fifths">
            <h3 class="title is-4 is-spaced has-text-centered">Edit advert</h3>
            <form action="process.php" method="POST">
                <div class="field">
                    <label for="InputName" class="label">Title :</label>
                    <div class="control">
                        <input class="input is-primary" type="text"
                            value="<?php echo $advert['title']; ?>"
                            name="edit_title" required required>
                    </div>
                </div>

                <div class="field">
                    <label for="InputPrice" class="label">Price :</label>
                    <div class="control">
                        <input class="input is-primary" type="number"
                            value="<?php echo $advert['price']; ?>"
                            name="edit_price" required>
                    </div>
                </div>

                <div class="field">
                    <label for="InputDescription" class="label">Description :</label>
                    <div class="control">
                        <textarea class="textarea is-primary" id="InputDescription" name="edit_content"
                            required><?php echo $advert['content']; ?>"</textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="InputAddress" class="label">Address :</label>
                    <div class="control">
                        <input class="input is-primary" type="text"
                            value="<?php echo $advert['address']; ?>"
                            name="edit_address" required>
                    </div>
                </div>
                <div class="field">
                    <label for="InputCity" class="label">City :</label>
                    <div class="control">
                        <input class="input is-primary" type="text"
                            value="<?php echo $advert['city']; ?>"
                            name="edit_city" required>
                    </div>
                </div>

                <div class="field">
                    <div class="file is-medium has-name is-primary">
                        <label class="file-label">
                            <input class="file-input" type="file" name="edit_images" value="images.jpg">
                            <span class="file-cta">
                                <span class="file-icon">
                                    <i class="fas fa-upload"></i>
                                </span>
                                <span class="file-label">
                                    File…
                                </span>
                            </span>
                            <span class="file-name">
                                Screen Shot 2017-07-29 at 15.54.25.png
                            </span>
                        </label>
                    </div>
                </div>

                <div class="field is-grouped ">
                    <div class="control">
                        <input type="hidden" name="edit_id"
                            value="<?php echo $advert['ad_id']; ?>">
                        <button class="button is-primary" name="edit_advert">Change</button>
                    </div>
                    <div class="control">
                        <button class="button is-primary is-outlined" href="profil.php">Cancel</button>
                    </div>
                </div>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
