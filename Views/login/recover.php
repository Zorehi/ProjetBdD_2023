<div class="recover-box">
    <form action="" method="POST">
        <div class="recover-head">
            <h2>Réinitialiser votre mot de passe</h2>
        </div>
        <div class="recover-info">
            <div class="recover-how">
                <div class="text">Comment voulez-vous recevoir votre code de réinitialisation du mot de passe ?</div>
                <div class="recover-radio">
                    <label for="send_email">
                        <input type="radio" name="email" id="send_email">
                        <div>
                            <div class="text-radio">Envoyer le code par email</div>
                            <div class="email">j***@*******</div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="recover-user">
                <img src="" alt="" width="60" height="60">
                <div class="fullname"><?= $fullname?></div>
                <div class="type">Utilisateur de Projet BdD</div>
            </div>
        </div>
        <div class="recover-button">
            <a href="/login/identify">Ce n'est pas vous ?</a>
            <button>Continer</button>
        </div>
    </form>
</div>