<div class="panel-section panel-create">
    <div class="panel-section-title">
        <h1>Créer une maison</h1>
    </div>
    <div class="panel-section-list">
        <div class="create-user-owner">
            <img class="img" src="assets/image/user-default-photo.png" alt="">
            <div class="text">
                <span class="primary"><?= $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] ?></span>
                <span class="secondary">Propriétaire</span>
            </div>
        </div>
        <form class="create-form" id="create-house" action="" method="POST">
            <input type="hidden" name="id_users" value="<?= $_SESSION['user']['id'] ?>">
            <div class="create-label-list scrollbar-container" id="scrollbar-4">
                <div class="scrollbar-content" data-transition="yes">
                    <label for="house_name" class="form-label-input" data-status="empty">
                        <span>Nom de la maison</span>
                        <input type="text" id="house_name" name="house_name" onchange="onChangeEvent(this)">
                    </label>
                    <label for="isolation_degree" class="form-label-input" data-status="empty">
                        <span>Degrée d'isolation</span>
                        <input type="text" id="isolation_degree" name="isolation_degree" onchange="onChangeEvent(this)">
                    </label>
                    <label for="eval_eco" class="form-label-input" data-status="empty">
                        <span>Evaluation de base eco-immeuble</span>
                        <input type="text" id="eval_eco" name="eval_eco" onchange="onChangeEvent(this)">
                    </label>
                    <label for="citizen_degree" class="form-label-input" data-status="empty">
                        <span>Degrée de citoyennetée</span>
                        <input type="text" id="citizen_degree" name="citizen_degree" onchange="onChangeEvent(this)">
                    </label>
                    <label for="street" class="form-label-input" data-status="empty">
                        <span>Rue</span>
                        <input type="text" id="street" name="street" onchange="onChangeEvent(this)">
                    </label>
                    <label for="house_number" class="form-label-input" data-status="empty">
                        <span>Numéro</span>
                        <input type="text" id="house_number" name="house_number" onchange="onChangeEvent(this)">
                    </label>
                    <label for="city_name" class="form-label-input" data-status="empty">
                        <span>Ville</span>
                        <input type="text" id="city_name" name="city_name" onchange="onChangeEvent(this)">
                    </label>
                    <label for="postcode" class="form-label-input" data-status="empty">
                        <span>Code postal</span>
                        <input type="text" id="postcode" name="postcode" onchange="onChangeEvent(this)">
                    </label>
                </div>
                <div class="scrollbar-track"></div>
                <div class="scrollbar-thumb" data-transition="yes" draggable="false" ondragstart="return false;">
                    <div></div>
                </div>
            </div>
            <div class="create-btn-container">
                <button class="create-btn">
                    <span>Créer</span>
                    <div class="hover"></div>
                </button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    document.getElementById('navLeft').dataset.always = 'small';

    const scrollbarContainer4 = document.getElementById('scrollbar-4');
    const scrollbar_4 = new ScrollBar(scrollbarContainer4, { offsetContainer: -16, offsetContent: 0});
    scrollbar_4.init();

    function onChangeEvent(element) {
        if (element.value != "") {
            element.parentElement.dataset.status = 'not-empty';
        } else {
            element.parentElement.dataset.status = 'empty';
        }
    }
</script>