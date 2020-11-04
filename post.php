<?php
require 'includes/header.php';
$title = 'Post - Stuliday';

?>

<div class="container">
    <h2></h2>
    <div class="column">

        <div class="field">
            <label class="label">Title :</label>
            <div class="control">
                <input class="input" type="text" placeholder="Text input">
            </div>
        </div>

        <div class="field">
            <label class="label">Price :</label>
            <div class="control">
                <input class="input" type="text" placeholder="Price">
            </div>
        </div>

        <div class="field">
            <label class="label">Description :</label>
            <div class="control">
                <textarea class="textarea" placeholder="Textarea"></textarea>
            </div>
        </div>

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
        </div>

        <div class="field">
            <label class="label">Adress :</label>
            <div class="control">
                <input class="input" type="text" placeholder="Adress">
            </div>
        </div>



        <div class="field">
            <div class="control">
                <label class="checkbox">
                    <input type="checkbox">
                    I agree to the <a href="#">terms and conditions</a>
                </label>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link">Post</button>
            </div>
            <div class="control">
                <button class="button is-link is-light">Cancel</button>
            </div>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
