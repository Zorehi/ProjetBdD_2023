<?php include ROOT."/Views/settings/panelSettings.php"; ?>

<div class="globalContainer">
    <div class="settings security">
        <div class="settings-title">
            <h2>Sécurité et connexion</h2>
        </div>
        <div>
            <div class="settings-category">
                <div class="settings-category-name">
                    <h3>Connexion</h3>
                </div>
                <div class="settings-category-list">
                    <div class="settings-modify" data-status="hidden">
                        <div>
                            <div class="settings-modify-icon">
                                <img src="assets/image/icon-password.png" alt="">
                            </div>
                            <div class="settings-modify-text">
                                <h3>Changer le mot de passe</h3>
                                <span>Nous vous conseillons d'utiliser un mot de passe sûr que vous n'utilisez nulle part ailleurs</span>
                            </div>
                            <div class="settings-modify-button">
                                <button type="button" class="settings-form-cancel">Modifier</button>
                            </div>
                        </div>
                        <div class="settings-content">
                            <form action="" method="post" class="settings-form">
                                <label for="old-password" class="settings-form-label">
                                    <span>Actuel</span>
                                    <input type="password" name="old-password" id="old-password">
                                </label>
                                <label for="new-password" class="settings-form-label">
                                    <span>Nouveau</span>
                                    <input type="password" name="new-password" id="new-password">
                                </label>
                                <label for="conf-new-password" class="settings-form-label">
                                    <span>Confirmer</span>
                                    <input type="password" name="conf-new-password" id="conf-new-password">
                                </label>
                                <div class="settings-form-divider"></div>
                                <div class="settings-form-button">
                                    <button class="settings-form-confirm">Enregistrer les modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    document.getElementById('security').setAttribute('aria-current', 'page');
    document.querySelector('[data-status=selected]').dataset.status = 'unselected';

    const modifyList = document.getElementsByClassName('settings-modify');

    for(const modify of modifyList) {
        const button = modify.getElementsByClassName('settings-form-cancel')[0];

        button.addEventListener('click', function() {
            if(modify.dataset.status == 'shown') {
                modify.dataset.status = 'hidden'
                button.textContent = "Modifier";
            } else {
                modify.dataset.status = 'shown'
                button.textContent = "Fermer";
            }
        })

        modify.addEventListener('click', function(event) {
            if(!button.contains(event.target)) {
                modify.dataset.status = 'shown'
                button.textContent = "Fermer";
            }
        })
    }

</script>