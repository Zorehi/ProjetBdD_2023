<div class="card-profil" id="card-profil" data-status="hidden">
    <div data-status="active" data-index="0">
        <div class="card-profil__users">
            <a href="#">
                <svg aria-hidden="true" data-visualcompletion="ignore-dynamic" role="none" style="height: 36px; width: 36px;">
                    <mask id="jsc_c_6h">
                        <circle cx="18" cy="18" fill="white" r="18"></circle>
                    </mask>
                    <g mask="url(#jsc_c_6h)">
                        <image x="0" y="0" height="100%" preserveAspectRatio="xMidYMid slice" width="100%" xlink:href="assets/image/user-default-photo.png" style="height: 36px; width: 36px;"></image>
                        <circle fill="none" cx="18" cy="18" r="18"></circle>
                    </g>
                </svg>
                <span><?= $_SESSION["user"]["firstname"] . " " . $_SESSION["user"]["lastname"] ?></span>
            </a>
        </div>
        <div class="card-profil__body">
            <div>
                <a href="/settings/?tab=account" id="settings">
                    <div>
                        <i style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yg/r/1c-D1PVpwAQ.png'); background-position: 0px -415px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                    </div>
                    <span>Paramètres et confidentialité</span>
                </a>
            </div>
            <div>
                <div id="displayButton">
                    <div>
                        <i style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yR/r/B__LYiWVclj.png'); background-position: 0px -238px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                    </div>
                    <span>Affichage et accessibilité</span>
                    <i style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/y5/r/jARXTcnV8gf.png'); background-position: -98px -59px; background-size: auto; width: 24px; height: 24px; background-repeat: no-repeat; display: inline-block;"></i>
                </div>
            </div>
            <div>
                <a href="/login/logout">
                    <div>
                        <i style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/y3/r/xUe9FxEKm90.png'); background-position: 0px -204px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                    </div>
                    <span>Se déconnecter</span>
                </a>
            </div>
        </div>
    </div>
    <div data-status="after" data-index="1">
        <div class="card-profil__display-head">
            <div id="goBack">
                <i style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/y5/r/jARXTcnV8gf.png'); background-position: -121px -99px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
            </div>
            <h2>Affichage et accessibilité</h2>
        </div>
        <div class="card-profil__display-body">
            <div>
                <div class="icon">
                    <i style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yR/r/B__LYiWVclj.png'); background-position: 0px -238px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                </div>
                <div>
                    <span>Mode sombre</span>
                    <span>Ajustez l’apparence de Facebook pour réduire les reflets et reposer vos yeux.</span>
                </div>
            </div>
            <div>
                <label for="DISABLED">
                    <span>Désactivé</span>
                    <input type="radio" name="dark-mode" value="DISABLED" id="DISABLED" style="display: none;">
                    <i id="ICON_DISABLED" style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yG/r/hjdndNytA0V.png'); background-position: -42px -145px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                </label>
                <label for="ENABLED">
                    <span>Activée</span>
                    <input type="radio" name="dark-mode" value="ENABLED" id="ENABLED" style="display: none;">
                    <i id="ICON_ENABLED" style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yG/r/hjdndNytA0V.png'); background-position: -42px -145px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                </label>
                <label for="USE_SYSTEME">
                    <div style="width: 260px;">
                        <span style="font-size: 15px;font-weight: 500;width: 248px;">Automatique</span>
                        <span style="font-size: 12px;font-weight: 400;width: 248px;">Nous ajusterons l’affichage automatiquement en fonction des paramètres système de votre appareil.</span>
                    </div>
                    <input type="radio" name="dark-mode" value="USE_SYSTEME" id="USE_SYSTEME" style="display: none;">
                    <i id="ICON_USE_SYSTEME" style="background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yG/r/hjdndNytA0V.png'); background-position: -42px -145px; background-size: auto; width: 20px; height: 20px; background-repeat: no-repeat; display: inline-block;"></i>
                </label>
            </div>
        </div>
    </div>
</div>