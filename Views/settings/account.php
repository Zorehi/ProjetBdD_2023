<?php include ROOT."/Views/settings/panelSettings.php"; ?>

<div class="globalContainer">
    <div class="settings" id="account">
        <div class="settings-wrapper">
            <div class="settings-title">
                <h2>Paramètres généraux du compte</h2>
            </div>
            <ul class="settings-list">
                <li>
                    <a role="button" class="settings-modify">
                        <div class="settings-modify-name">
                            <h3>Nom</h3>
                        </div>
                        <div class="settings-modify-value">
                            <span><strong><?= $user->getFirstname() . ' ' . $user->getLastname() ?></strong></span>
                        </div>
                        <div class="settings-modify-action">
                            <span>Modifier</span>
                        </div>
                    </a>
                    <div class="settings-content">
                        <div class="settings-content-name">
                            <h3>Nom</h3>
                        </div>
                        <form action="" method="post" class="settings-form">
                            <input type="hidden" name="type" value="fullname">
                            <label for="firstname" class="settings-form-label">
                                <span>Prénom</span>
                                <input type="text" name="firstname" value="<?= $user->getFirstname() ?>" id="firstname">
                            </label>
                            <label for="lastname" class="settings-form-label">
                                <span>Nom de famille</span>
                                <input type="text" name="lastname" value="<?= $user->getLastname() ?>" id="lastname">
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
                    <a role="button" class="settings-modify">
                        <div class="settings-modify-name">
                            <h3>Nom d'utilisateur</h3>
                        </div>
                        <div class="settings-modify-value">
                            <span><?= $user->getUsername() ? '<strong>'.$user->getUsername().'</strong>' : "Vous n'avez pas défini de nom d'utilisateur." ?></span>
                        </div>
                        <div class="settings-modify-action">
                            <span>Modifier</span>
                        </div>
                    </a>
                    <div class="settings-content">
                        <div class="settings-content-name">
                            <h3>Nom d'utilisateur</h3>
                        </div>
                        <form action="" method="post" class="settings-form">
                            <input type="hidden" name="type" value="username">
                            <label for="username" class="settings-form-label">
                                <span>Nom d'utilisateur</span>
                                <input type="text" name="username" id="username" value="<?= $user->getUsername() ?>">
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
                    <a role="button" class="settings-modify">
                        <div class="settings-modify-name">
                            <h3>Email</h3>
                        </div>
                        <div class="settings-modify-value">
                            <span><?= $user->getEmail() ? '<strong>'.$user->getEmail().'</strong>' : "Vous n'avez pas défini d'email." ?></span>
                        </div>
                        <div class="settings-modify-action">
                            <span>Modifier</span>
                        </div>
                    </a>
                    <div class="settings-content">
                        <div class="settings-content-name">
                            <h3>Email</h3>
                        </div>
                        <form action="" method="post" class="settings-form">
                            <input type="hidden" name="type" value="email">
                            <label for="email" class="settings-form-label">
                                <span>Email</span>
                                <input type="email" name="email" value="<?= $user->getEmail() ?>" id="email">
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
                    <a role="button" class="settings-modify">
                        <div class="settings-modify-name">
                            <h3>Numéro de téléphone</h3>
                        </div>
                        <div class="settings-modify-value">
                            <span><?= $user->getTel() ? '<strong>'.$user->getTel().'</strong>' : "Vous n'avez pas défini de numéro de téléphone." ?></span>
                        </div>
                        <div class="settings-modify-action">
                            <span>Modifier</span>
                        </div>
                    </a>
                    <div class="settings-content">
                        <div class="settings-content-name">
                            <h3>Numéro de téléphone</h3>
                        </div>
                        <form action="" method="post" class="settings-form">
                            <input type="hidden" name="type" value="tel">
                            <label for="tel" class="settings-form-label">
                                <span>Numéro de téléphone</span>
                                <input type="tel" name="tel" value="<?= $user->getTel() ?>" id="tel">
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
</div>

<script text="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';
    document.getElementById('btn-account').setAttribute('aria-current', 'page');
    const account = document.getElementById('account');

    const modifyList = document.getElementsByClassName('settings-modify');
    const cancelList = document.getElementsByClassName('settings-form-cancel');
    
    const onClickModify = function() {
        const elem = account.querySelector('[data-status=modifying]');
        if (elem) {
            elem.removeAttribute('data-status');
        }

        if (this.dataset.status != 'modifying') {
            this.parentElement.dataset.status = 'modifying';
        }
    }

    const onClickCancel = function() {
        account.querySelector('[data-status=modifying]').removeAttribute('data-status');
    }
    
    for (const button of modifyList) {
        button.addEventListener('click', onClickModify);
    }
    for (const button of cancelList) {
        button.addEventListener('click', onClickCancel);
    }


</script>