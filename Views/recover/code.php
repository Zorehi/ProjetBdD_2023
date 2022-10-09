<div class="card-recover">
    <form action="" method="POST">
        <div class="card-recover__head">
            <h2>Entrez le code de sécurité</h2>
        </div>
        <div class="card-recover__body">
            <?php if (strstr($send_to, "@")) { ?>
                <div>Merci de vérifier dans vos e-mails que vous avez reçu un message avec votre code. Celui-ci est composé de 6 chiffres.</div>
            <?php } else { ?>
                <div>Merci de vérifier sur votre téléphone que vous avez reçu un message avec votre code. Celui-ci est composé de 6 chiffres.</div>
            <?php } ?>    
            <div style="display: flex;">
                <div class="input-code">
                    <input type="text" name="code" placeholder="Entrez le code">
                </div>
                <div class="info-code">
                    <div>Nous avons envoyé votre code à :</div>
                    <div><?= $send_to ?></div>
                </div>
            </div>
        </div>
        <div class="card-recover__footer">
            <a href="/recover/initiate/<?= $id ?>" id="left">Code non reçu ?</a>
            <a href="/login/identify">Annuler</a>
            <button>Continer</button>
        </div>
    </form>
</div>