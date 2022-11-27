<?php include ROOT."/Views/settings/panelSettings.php"; ?>

<div class="globalContainer">
    <div class="settings">
        <div class="settings-title">
            <h2>Paramètres généraux du compte</h2>
        </div>
        <ul class="settings-list">
            <li>
                <a role="button" data-status="shown" class="settings-modify">
                    <div class="settings-modify-name">
                        <h3>Nom</h3>
                    </div>
                    <div class="settings-modify-value">
                        <span><strong>Jérémy Legrix</strong></span>
                    </div>
                    <div class="settings-modify-action">
                        <span>Modifier</span>
                    </div>
                </a>
                <div class="settings-content" data-status="hidden">
                    <div class="settings-content-name">
                        <h3>Nom</h3>
                    </div>
                    <form action="" method="post" class="settings-form">
                        <label for="firstname" class="settings-form-label">
                            <span>Prénom</span>
                            <input type="text" id="firstname">
                        </label>
                        <label for="lastname" class="settings-form-label">
                            <span>Nom de famille</span>
                            <input type="text" id="lastname">
                        </label>
                        <div class="settings-form-divider"></div>
                        <div class="settings-form-button">
                            <button class="settings-form-confirm">Confirmer le changement</button>
                            <button class="settings-form-cancel" type="button">Annuler</button>
                        </div>
                    </form>
                </div>
            </li>
            <li>
                <a role="button" data-status="shown" class="settings-modify">
                    <div class="settings-modify-name">
                        <h3>Nom d'utilisateur</h3>
                    </div>
                    <div class="settings-modify-value">
                        <span>Vous n'avez pas défini de nom d'utilisateur.</span>
                    </div>
                    <div class="settings-modify-action">
                        <span>Modifier</span>
                    </div>
                </a>
                <div class="settings-content" data-status="hidden">
                    <div class="settings-content-name">
                        <h3>Nom d'utilisateur</h3>
                    </div>
                    <form action="" method="post" class="settings-form">
                        <label for="firstname" class="settings-form-label">
                            <span>Nom d'utilisateur</span>
                            <input type="text" id="firstname">
                        </label>
                        <div class="settings-form-divider"></div>
                        <div class="settings-form-button">
                            <button class="settings-form-confirm">Confirmer le changement</button>
                            <button class="settings-form-cancel" type="button">Annuler</button>
                        </div>
                    </form>
                </div>
            </li>
            <li>
                <a role="button" data-status="shown" class="settings-modify">
                    <div class="settings-modify-name">
                        <h3>Email</h3>
                    </div>
                    <div class="settings-modify-value">
                        <span><strong>jeremy284@hotmail.com</strong></span>
                    </div>
                    <div class="settings-modify-action">
                        <span>Modifier</span>
                    </div>
                </a>
                <div class="settings-content" data-status="hidden">
                    <div class="settings-content-name">
                        <h3>Email</h3>
                    </div>
                    <form action="" method="post" class="settings-form">
                        <label for="firstname" class="settings-form-label">
                            <span>Email</span>
                            <input type="text" id="firstname">
                        </label>
                        <div class="settings-form-divider"></div>
                        <div class="settings-form-button">
                            <button class="settings-form-confirm">Confirmer le changement</button>
                            <button class="settings-form-cancel" type="button">Annuler</button>
                        </div>
                    </form>
                </div>
            </li>
            <li>
                <a role="button" data-status="shown" class="settings-modify">
                    <div class="settings-modify-name">
                        <h3>Numéro de téléphone</h3>
                    </div>
                    <div class="settings-modify-value">
                        <span><strong>06 81 10 48 17</strong></span>
                    </div>
                    <div class="settings-modify-action">
                        <span>Modifier</span>
                    </div>
                </a>
                <div class="settings-content" data-status="hidden">
                    <div class="settings-content-name">
                        <h3>Numéro de téléphone</h3>
                    </div>
                    <form action="" method="post" class="settings-form">
                        <label for="firstname" class="settings-form-label">
                            <span>Numéro de téléphone</span>
                            <input type="text" id="firstname">
                        </label>
                        <div class="settings-form-divider"></div>
                        <div class="settings-form-button">
                            <button class="settings-form-confirm">Confirmer le changement</button>
                            <button class="settings-form-cancel" type="button">Annuler</button>
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    document.getElementById('account').setAttribute('aria-current', 'page');
    document.querySelector('[data-status=selected]').dataset.status = 'unselected';

    const modifyList = document.getElementsByClassName('settings-modify');
    const cancelList = document.getElementsByClassName('settings-form-cancel');
    
    const onClickModify = function() {
        if (this.dataset.status == 'shown') {
            this.dataset.status = 'hidden';
            this.parentElement.children[1].dataset.status = 'shown';
        } else {
            this.dataset.status = 'shown';
            this.parentElement.children[1].dataset.status = 'hidden';
        }
    }

    const onClickCancel = function() {
        this.parentElement.parentElement.parentElement.parentElement.children[0].dispatchEvent(new Event("click"));
    }
    
    for (const button of modifyList) {
        button.addEventListener('click', onClickModify);
    }
    for (const button of cancelList) {
        button.addEventListener('click', onClickCancel);
    }


</script>