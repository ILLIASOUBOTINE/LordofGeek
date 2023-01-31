<section id="registration">
    <form method="POST" action="index.php?uc=compte&action=authentification">
        <fieldset>
            <legend>authentification</legend>

            <p>
                <label for="mail_reg">mail* </label>
                <input id="mail_reg" type="text" name="mail_auth" size=" 200" maxlength="200">
            </p>
            <p>
                <label for="password_reg">mot de passe*</label>
                <input id="password_reg" type="text" name="password_auth" size="32" maxlength="32">
            </p>
            <p>
                <button type="submit" name="authentification">Valider</button>
            </p>
    </form>

</section>