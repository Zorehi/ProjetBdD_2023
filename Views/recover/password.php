<div class="card-recover">
    <form action="" method="POST">
        <div class="card-recover__head">
            <h2>Choisissez un nouveau mot de passe</h2>
        </div>
        <div class="card-recover__body">
            <div>Créez un mot de passe d’au moins 6 caractères. Un mot de passe fort est une combinaison de lettres, de chiffres et de signes de ponctuation.</div>
            <div class="password-input">
                <div>
                    <input type="password" name="password" id="pass" placeholder="Nouveau mot de passe">
                    <button type="button" onclick="pass_switch()" id="buttonSwitch">Afficher</button>
                </div>
                <button type="button" onclick="help()">?</button>
            </div>
        </div>
        <div class="card-recover__footer">
            <a href="/login/identify">Ignorer</a>
            <button>Continer</button>
        </div>
    </form>
</div>
<div id="divCloud" class="password-cloud" hidden>
    <div class="card-help">
        <div class="card-help__head">
            <img src="https://static.xx.fbcdn.net/rsrc.php/v3/yO/r/zgulV2zGm8t.png" onclick="stop()" alt="" width="24" height="24">
            <div>Créer un mot de passe fiable</div>
        </div>
        <div class="card-help__body">
            <div>
                Lorsque vous créez votre mot de passe, n’oubliez pas ce qui suit  :
                <ul>
                    <li>Il <strong>ne doit pas</strong> contenir votre nom.</li>
                    <li>Il <strong>ne doit pas</strong> contenir un mot du dictionnaire.</li>
                    <li>Il <strong>doit</strong> contenir un ou plusieurs chiffres.</li>
                    <li>Il <strong>doit</strong> contenir des lettres majuscules et minuscules.</li>
                    <li>Il <strong>doit</strong> contenir au moins 6 caractères.</li>
                </ul>
            </div>
            <button type="button" onclick="stop()" class="help-button">OK</button>
        </div>
    </div>
</div>
<script text="text/javascript">
    /* Pour afficher la fenetre d'inscription */
    function help() {
        document.getElementById("divCloud").hidden = false;
    }

    function stop() {
        document.getElementById("divCloud").hidden = true;
    }

    function pass_switch() {
        inpPwd = document.getElementById("pass");
        buttonSwitch = document.getElementById("buttonSwitch");
        if (inpPwd.type == "password") {
            inpPwd.type = "text";
            buttonSwitch.textContent = "Masquer";
        } else {
            inpPwd.type = "password";
            buttonSwitch.textContent = "Afficher";
        }
    }
</script>