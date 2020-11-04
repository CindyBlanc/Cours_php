<?php
require 'includes/header.php';
$title = 'Post - Stuliday';

?>

<div class="container">
    <h2></h2>
    <div class="column">
        <form action="process.php" method="POST">
            <div class="field">
                <label for="InputName" class="label">Title :</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Text input" name="ad_name" required>
                </div>
            </div>

            <div class="field">
                <label for="InputPrice" class="label">Price :</label>
                <div class="control">
                    <input class="input" type="number" placeholder="Price" name="ad_price" required>
                </div>
            </div>

            <div class="field">
                <label for="InputDescription" class="label">Description :</label>
                <div class="control">
                    <textarea class="textarea" placeholder="Textarea" id="InputDescription" name="ad_description"
                        required></textarea>
                </div>
            </div>
            <!-- 
            <div class="field">
                <div class="file is-medium has-name is-info">
                    <label class="file-label">
                        <input class="file-input" type="file" name="resume">
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
            </div> -->

            <div class="field">
                <label for="InputAddress" class="label">Adress :</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Adress" name="ad_city" required>
                </div>
            </div>

            <!-- <div class="field">
                <div class="control">
                    <label class="checkbox">
                        <input type="checkbox">
                        I agree to the <a href="#">terms and conditions</a>
                    </label>
                </div>
            </div> -->

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" name="ad_submit">Post</button>
                </div>
                <div class="control">
                    <button class="button is-link is-light" href="profil.php">Cancel</button>
                </div>
            </div>
    </div>
</div>

<?php
require 'includes/footer.php';
