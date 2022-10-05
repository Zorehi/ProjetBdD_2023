<div class="login-box">
    <form action="" method="POST">
        <input type="hidden" name="type" value="login">
        <div>
            <div class="login-input">
                <input type="text" name="email" placeholder="Adresse e-mail ou numéro de tél.">
            </div>
            <div class="login-input">
                <input type="password" name="password" placeholder="Mot de passe" id="pass">
                <div class="iconPassword" onclick="pass_switch()">
                    <img class="img" src="https://static.xx.fbcdn.net/rsrc.php/v3/yZ/r/je5FEJkU1_K.png" alt="" width="16" height="16" id="passIcon">
                </div>
            </div>
        </div>
        <div class="login-button">
            <button>Se connecter</button>
        </div>
        <div class="pass-forget">
            <a href="/login/identify">Mot de passe oublié ?</a>
        </div>
        <div class="line"></div>
        <div class="login-button">
            <a role="button" onclick="register()">Créer un nouveau compte</a>
        </div>
    </form>
</div>
<div id="divCloud" class="cloud" hidden>
    <div class="register-box">
        <div class="register-head">
            <img class="img" src="https://static.xx.fbcdn.net/rsrc.php/v3/yO/r/zgulV2zGm8t.png" onclick="stop()" alt="" width="24" height="24">
            <div class="fcb">S'inscrire</div>
            <div class="fcg">C'est rapide et facile</div>
        </div>
        <div class="register-info">
            <form action="" method="POST">
                <input type="hidden" name="type" value="register">
                <div class="_10pad">
                    <span>
                        <div>
                            <input type="text" name="firstname" class="register-input" placeholder="Prénom" required>
                        </div>
                        <div>
                            <input type="text" name="lastname" class="register-input" placeholder="Nom de famille" required>
                        </div>
                    </span>
                </div>
                <div class="_10pad">
                    <input type="text" name="email" class="register-input long" placeholder="Numéro de mobile ou e-mail" required>
                </div>
                <div class="_10pad">
                    <input type="password" name="password" class="register-input long" placeholder="Mot de passe" required>
                </div>
                <div class="_10pad">
                    <div class="little-text">
                        Date de naissance
                    </div>
                    <span>
                        <select name="day" class="register-select">
                            <option disabled selected>Jour</option>
                            <?php
                            $min = 1;
                            $max = 31;
                            for ($i = $min; $i <= $max; $i++) {
                                echo '<option value="' . $i . '" id="day' . $i .'">' . $i . '</option>';
                            }
                            ?>
                        </select>
                        <select name="month" class="register-select">
                            <option disabled selected>Mois</option>
                            <?php
                            $min = 1;
                            $max = 12;
                            $month = ["Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];
                            for ($i = $min; $i <= $max; $i++) {
                                echo '<option value="' . $i . '" id="month'.$i.'" >' . $month[$i - 1] . '</option>';
                            }
                            ?>
                        </select>
                        <select name="year" class="register-select">
                            <option disabled selected>Année</option>
                            <?php
                            $min = 1900;
                            $max = date('Y');
                            for ($i = $max; $i >= $min; $i--) {
                                echo '<option value="' . $i . '" id="year'.$i.'" >' . $i . '</option>';
                            }
                            ?>
                        </select>
                    </span>
                </div>
                <div class="_10pad">
                    <div class="little-text">
                        Genre
                    </div>
                    <span class="flex-wrap">
                        <span>
                            <label class="register-label" for="woman">Femme</label>
                            <input type="radio" name="sex" value="woman" id="woman" class="register-radio">
                        </span>
                        <span>
                            <label class="register-label" for="man">Homme</label>
                            <input type="radio" name="sex" value="man" id="man" class="register-radio">
                        </span>
                        <span>
                            <label class="register-label" for="other">Personnalisé</label>
                            <input type="radio" name="sex" value="other" id="other" class="register-radio">
                        </span>
                    </span>
                </div>
                <div>
                    <button class="register-button">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script text="text/javascript">
    /* Pour afficher la fenetre d'inscription */
    function register() {
        document.getElementById("divCloud").hidden = false;
    }

    function stop() {
        document.getElementById("divCloud").hidden = true;
    }

    function pass_switch() {
        inpPwd = document.getElementById("pass");
        iconShowPwd = document.getElementById("passIcon");
        if (inpPwd.type == "password") {
            inpPwd.type = "text";
            iconShowPwd.setAttribute("src", "https://static.xx.fbcdn.net/rsrc.php/v3/yk/r/swFqSxKYa5M.png")
        } else {
            inpPwd.type = "password";
            iconShowPwd.setAttribute("src", "https://static.xx.fbcdn.net/rsrc.php/v3/yZ/r/je5FEJkU1_K.png")
        }
    }
</script>
<script src=""></script>