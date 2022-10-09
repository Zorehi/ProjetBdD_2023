<div class="card-recover">
    <form action="" method="POST">
        <div class="card-recover__head">
            <h2>Réinitialiser votre mot de passe</h2>
        </div>
        <div class="card-recover__body" style="display: flex;">
            <div style="width: 60%; margin: 0;">
                <div style="margin-bottom: 20px;">Comment voulez-vous recevoir votre code de réinitialisation du mot de passe ?</div>
                <div class="recover-input-radio">
                    <?php if ($email) { ?>
                        <label for="send_email">
                            <input type="radio" name="send" id="send_email" value="email">
                            <div>
                                <div>Envoyer le code par email</div>
                                <div>j***@*******</div>
                            </div>
                        </label>
                    <?php } ?>
                    <?php if ($tel) { ?>
                        <label for="send_sms">
                            <input type="radio" name="send" id="send_sms" value="sms">
                            <div>
                                <div>Envoyer le code par SMS</div>
                                <div>********17</div>
                            </div>
                        </label>
                    <?php } ?>
                </div>
            </div>
            <div class="recover-user">
                <img src="https://scontent.fbod1-1.fna.fbcdn.net/v/t1.30497-1/143086968_2856368904622192_1959732218791162458_n.png?_nc_cat=1&ccb=1-7&_nc_sid=7206a8&_nc_ohc=D4MkQJTW3IMAX9AQGAE&_nc_ht=scontent.fbod1-1.fna&oh=00_AT9MhxjvbOepN3BUs7ycUyYNL0ZFUPSJN4QuN_ZmovoBdw&oe=6364B778" alt="" width="60" height="60">
                <div>
                    <div><?= $fullname?></div>
                    <div>Utilisateur de Projet BdD</div>
                </div>
            </div>
        </div>
        <div class="card-recover__footer">
            <a href="/login/identify">Ce n'est pas vous ?</a>
            <button>Continer</button>
        </div>
    </form>
</div>