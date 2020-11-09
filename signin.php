<?php
require 'includes/header.php';
$title = 'Signin - Stuliday';

if (!empty($_POST['submit_signup']) && !empty($_POST['email_signup']) && !empty($_POST['password1_signup']) && !empty($_POST['username_signup'])) {
    $pass_su = htmlspecialchars($_POST['password1_signup']);
    $repass_su = htmlspecialchars($_POST['password2_signup']);
    $email_su = htmlspecialchars($_POST['email_signup']);
    $username = htmlspecialchars($_POST['username_signup']);

    inscription($email_su, $pass_su, $repass_su, $username);
}
if (!empty($_POST['submit_login']) && !empty($_POST['email_login']) && !empty($_POST['password_login'])) {
    $pass_login = htmlspecialchars($_POST['password_login']);
    $email_login = htmlspecialchars($_POST['email_login']);

    connexion($email_login, $pass_login);
}
?>


<div class="container" style="margin-top: 10vh;">
    <div class="columns">
        <div class="column">
            <form
                action="<?php $_SERVER['REQUEST_URI']; ?>"
                method="post">

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-primary" type="email" placeholder="Type your e-mail" value=""
                            name="email_signup">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-primary" type="password" placeholder="Choose a password" value=""
                            name="password1_signup">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Re-enter your password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-primary" type="password" placeholder="Choose a password" value=""
                            name="password2_signup">

                        </span>
                    </div>
                </div>


                <div class="field">
                    <label class="label">Username</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-primary" type="text" placeholder="Choose a username" value=""
                            name="username_signup" required>
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
                        <input type="submit" value="Sign Up !" name="submit_signup" class="button is-primary">
                    </div>
                </div>

            </form>
        </div>


        <div class="column">
            <form
                action="<?php $_SERVER['REQUEST_URI']; ?>"
                method="post">

                <div class="field">
                    <label class="label">Email</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-primary" type="email" placeholder="Type your e-mail" value=""
                            name="email_login">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-primary" type="password" placeholder="Password" value=""
                            name="password_login">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                </div>


                <div class="field is-grouped">
                    <div class="control">
                        <button type="submit" class="button is-primary" name="submit_login"
                            value="Login">Connexion</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php
require 'includes/footer.php';
