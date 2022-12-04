<div class="card-recover">
    <form action="" method="POST">
        <div class="card-recover__head">
            <h2>Réinitialiser votre mot de passe</h2>
        </div>
        <div class="card-recover__body" style="display: flex;">
            <div style="width: 60%; margin: 0;">
                <div style="margin-bottom: 20px;">Comment voulez-vous recevoir votre code de réinitialisation du mot de passe ?</div>
                <div class="recover-input-radio">
                    <?php if ($user->getEmail()) { ?>
                        <label for="send_email">
                            <input type="radio" name="send" id="send_email" value="email">
                            <div>
                                <div>Envoyer le code par email</div>
                                <div><?= $user->getEmail()[0] ?>***@*******</div>
                            </div>
                        </label>
                    <?php } ?>
                    <?php if ($user->getTel()) { ?>
                        <label for="send_sms">
                            <input type="radio" name="send" id="send_sms" value="sms">
                            <div>
                                <div>Envoyer le code par SMS</div>
                                <div>********<?= substr($user->getTel(), -2, 2) ?></div>
                            </div>
                        </label>
                    <?php } ?>
                </div>
            </div>
            <div class="recover-user">
                <img src="assets/image/user-default-photo.png" alt="" width="60" height="60">
                <div>
                    <div><?= $user->getFirstname() . ' ' .$user->getLastname() ?></div>
                    <div><?= $user->getType() == 'admin' ? 'Administrateur' : 'Utilisateur' ?> de Projet BdD</div>
                </div>
            </div>
        </div>
        <div class="card-recover__footer">
            <a href="/login/identify">Ce n'est pas vous ?</a>
            <button>Continer</button>
        </div>
    </form>
</div>