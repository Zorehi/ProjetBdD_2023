<div class="code-box">
    <form action="" method="POST">
        <div class="code-head">
            <h2>Entrez le code de sécurité</h2>
        </div>
        <div class="code-info">
            <div class="text">Merci de vérifier dans vos e-mails que vous avez reçu un message avec votre code. Celui-ci est composé de 6 chiffres.</div>
            <div class="inline">
                <div class="code-input">
                    <input type="text" name="code" placeholder="Entrez le code">
                </div>
                <div class="code-email">
                    <div>Nous avons envoyé votre code à :</div>
                    <div class="email"><?= $email ?></div>
                </div>
            </div>
        </div>
        <div class="code-button">
            <a href="/recover/initiate/<?= $id ?>" class="left">Code non reçu ?</a>
            <a href="/login/identify" class="a-button">Annuler</a>
            <button>Continer</button>
        </div>
    </form>
</div>